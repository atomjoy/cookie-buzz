<script>
// 1. Rejestr bezpiecznych i dozwolonych funkcji
const AkcjeAplikacji = {
    przywitaj: (dataset) => {
        console.log(`Cześć, ${dataset.user}!`);
    },

    usunWpis: (dataset) => {
        console.log(`Wysyłam żądanie usunięcia wpisu o ID: ${dataset.id}`);
    },

    eksportujPlik: (dataset) => {
        // dataset zawiera automatycznie camelCase dla wieloczłonowych nazw (data-format -> dataset.format)
        console.log(`Generowanie pliku ${dataset.format} dla typu: ${dataset.typ}`);
    }
};

// 2. Globalny delegat zdarzeń (nasłuchuje kliknięć na całej stronie)
document.addEventListener('click', (event) => {
    // Sprawdzamy, czy kliknięty element (lub jego rodzic) posiada zdefiniowaną akcję
    const element = event.target.closest('[data-action]');

    if (!element) return; // Jeśli to zwykły klik, ignorujemy

    const nazwaAkcji = element.dataset.action;

    // 3. Bezpieczne uruchomienie funkcji z mapy bez używania eval()
    if (typeof AkcjeAplikacji[nazwaAkcji] === 'function') {
        event.preventDefault(); // Opcjonalne blokowanie domyślnej akcji (np. dla linków)

        // Przekazujemy cały obiekt dataset (zawierający parametry z atrybutów data-*)
        AkcjeAplikacji[nazwaAkcji](element.dataset);
    } else {
        console.warn(`Akcja "${nazwaAkcji}" nie została zarejestrowana w systemie.`);
    }
});
</script>