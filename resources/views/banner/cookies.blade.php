<script>
// Accept all Google and FacebookPixel cookies
function logAddedCookies() {
	console.log("%c[Cookie Manager] Accept All! cookies:", "color: #00bcd4; font-weight: bold; font-size: 12px;");
	console.table([
		{ "Plik Cookie": "_ga", "Dostawca": "Google Analytics", "Typ": "Statystyczne", "Status": "Aktywne" },
		{ "Plik Cookie": "_ga_*", "Dostawca": "Google Analytics", "Typ": "Statystyczne", "Status": "Aktywne" },
		{ "Plik Cookie": "_gcl_au", "Dostawca": "Google Ads", "Typ": "Marketingowe", "Status": "Aktywne" },
		{ "Plik Cookie": "_fbp", "Dostawca": "Meta / Facebook", "Typ": "Marketingowe", "Status": "Aktywne" },
		{ "Plik Cookie": "_fbc", "Dostawca": "Meta / Facebook", "Typ": "Marketingowe (jeśli z reklamy)", "Status": "Aktywne" }
	]);
}

// Show cookies in console
function logActiveBrowserCookies() {
	setTimeout(function () {
		var cookieString = document.cookie;
		if (!cookieString) {
			console.log("%c[Cookie Manager] No cookies.", "color: #ff9800; font-weight: bold;");
			return;
		}
		var cookiesArray = cookieString.split(';').map(function (cookie) {
			var parts = cookie.split('=');
			return {
				"Nazwa pliku cookie": parts[0].trim(),
				"Wartość (Skrócona)": parts[1] ? parts[1].trim().substring(0, 15) + "..." : ""
			};
		});
		console.log("%c[Cookie Manager] Sukces! Cookies list:", "color: #4caf50; font-weight: bold; font-size: 12px;");
		console.table(cookiesArray);
	}, 1000);
}

// Delete gta, pixel cookies
function deleteSpyCookies() {
	var domain = window.location.hostname;
	var domainParts = domain.split('.');
	var cookiesToClear = ['_ga', '_gid', '_gcl_au', '_fbp', '_fbc'];

	cookiesToClear.forEach(function(cookieName) {
		if (domainParts.length > 2) {
			var mainDomain = '.' + domainParts.slice(-2).join('.');
			document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + mainDomain;
		}
		document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=.' + domain;
		document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + domain;
		document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
	});
	// GA4 ID (_ga_X1Y2Z3)
	var allCookies = document.cookie.split(';');
	for (var i = 0; i < allCookies.length; i++) {
		var cName = allCookies[i].split('=')[0].trim();
		if (cName.indexOf('_ga_') === 0) {
			document.cookie = cName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + domain;
			if (domainParts.length > 2) {
				var mainDomain = '.' + domainParts.slice(-2).join('.');
				document.cookie = cName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + mainDomain;
			}
		}
	}
	console.log("[Cookie Manager] Wow 'denied'. Cookies deleted from browser.");
}
</script>