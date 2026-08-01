const cookieBuzzCategories = window.cookieBuzz;

const cookieBuzzBanner = document.getElementById('cookie-buzz-banner-wrapper');
const cookieBuzzModal = document.getElementById('cookie-buzz-preferences-wrapper');
const cookieBuzzClose = document.getElementById('cookie-buzz-preferences-close');
const cookieBuzzOpen = document.getElementById('cookie-buzz-preferences-open');
const cookieBuzzAccept = document.getElementById('cookie-buzz-accept');
const cookieBuzzReject = document.getElementById('cookie-buzz-reject');
const cookieBuzzAcceptPreferences = document.getElementById('cookie-buzz-accept-preferences');
const cookieBuzzRejectPreferences = document.getElementById('cookie-buzz-reject-preferences');
const cookiBuzzCheckboxes = document.querySelectorAll('.cookie-buzz-checkbox');

cookiBuzzCheckboxes.forEach((el) => {
    el.addEventListener('click', function (e) {
        cookieBuzzUpdate(e.target);
    });
});

cookieBuzzClose.addEventListener('click', function (e) {
    toggleCookieBuzzPreferences();
});

cookieBuzzOpen.addEventListener('click', function (e) {
    toggleCookieBuzzPreferences();
});

cookieBuzzReject.addEventListener('click', function (e) {
    toggleCookieBuzzBanner();
    rejectCookieBuzz(cookieBuzzCategories);
});

cookieBuzzAccept.addEventListener('click', function (e) {
    toggleCookieBuzzBanner();
    allowCookieBuzz(cookieBuzzCategories);
});

cookieBuzzRejectPreferences.addEventListener('click', function (e) {
    closeCookieBuzzBanner();
    rejectCookieBuzz(cookieBuzzCategories);
});

cookieBuzzAcceptPreferences.addEventListener('click', function (e) {
    closeCookieBuzzBanner();
    allowCookieBuzz(cookieBuzzCategories);
});

function toggleCookieBuzzPreferences() {
    cookieBuzzModal.classList.toggle('is-visible');
}

function toggleCookieBuzzBanner() {
    cookieBuzzBanner.classList.toggle('hide-banner');
    localStorage.setItem('cookie-buuz-banner-{{ $prefix }}', localStorage.getItem('cookie-buuz-banner-{{ $prefix }}') == 1 ? 0 : 1);
}

function closeCookieBuzzBanner() {
    cookieBuzzBanner.classList.add('hide-banner');
    localStorage.setItem('cookie-buuz-banner-{{ $prefix }}', 1);
}

function cookieBuzzUpdate(checkbox) {
    const key = 'cookie_buzz_{{ $prefix }}_' + checkbox.dataset.category;
    localStorage.setItem(key, checkbox.checked);
    // Run action function if checked
    if (checkbox.checked) {
        evalAction(checkbox.dataset.action);
    } else {
        evalAction(checkbox.dataset.action_reject);
    }
    console.log('Update cookie key:', key, 'Value:', localStorage.getItem(key));
}

function evalAction(name) {
    // Run function from string
    if (name) {
        const action = actionsList[name];
        if (typeof action === 'function') {
            action();
        }
    }
}

function allowCookieBuzz(obj) {
    Object.entries(obj).forEach((category) => {
        const name = category[0] ?? 'null';
        const details = category[1] ?? null;
        const key = 'cookie_buzz_{{ $prefix }}_' + name;
        const el = document.getElementById('cookie-buzz-checkbox-' + name);

        if (el && !details['locked']) {
            el.checked = true;
            localStorage.setItem(key, true);
            evalAction(details['js_action']);
        }
    });
}

function rejectCookieBuzz(obj) {
    Object.entries(obj).forEach((category) => {
        const name = category[0] ?? 'null';
        const details = category[1] ?? null;
        const key = 'cookie_buzz_{{ $prefix }}_' + name;
        const el = document.getElementById('cookie-buzz-checkbox-' + name);

        if (el && !details['locked']) {
            el.checked = false;
            localStorage.setItem(key, false);
            evalAction(details['js_action_reject']);
        }
    });
}

function loadCookieBuzz(obj) {
    Object.entries(obj).forEach((category) => {
        const name = category[0] ?? 'null';
        const details = category[1] ?? null;
        const key = 'cookie_buzz_{{ $prefix }}_' + name;
        const el = document.getElementById('cookie-buzz-checkbox-' + name);

        if (el && !details['locked']) {
            el.checked = localStorage.getItem(key) == 'true' ? true : false;
            if (el.checked) {
                evalAction(details['js_action']);
            }
        }
    });
}

function loadCookieBuzzBanner() {
    const hide = localStorage.getItem('cookie-buuz-banner-{{ $prefix }}') ?? 0;
    if (hide == 1) {
        cookieBuzzBanner.classList.add('hide-banner');
    } else {
        cookieBuzzBanner.classList.remove('hide-banner');
    }
}

loadCookieBuzzBanner();
loadCookieBuzz(cookieBuzzCategories);
