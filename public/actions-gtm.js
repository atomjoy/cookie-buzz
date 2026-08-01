// Actions list
const actionsList = {
    loadAnalytics,
    loadMarketing,
    rejectAnalytics,
    rejectMarketing,
    loadPreferences,
    rejectPreferences,
};

// Update cookie
function onConsentUpdated() {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'cookie_consent_update',
    });
}

// Required for js_action in coockie banner events
function loadAnalytics() {
    console.log('Analytics action works!');

    try {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                analytics_storage: 'granted',
            });
            onConsentUpdated();
        }
    } catch (e) {
        console.error(e);
    }
}

function loadMarketing() {
    console.log('Marketing action works!');

    try {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                ad_storage: 'granted',
                ad_user_data: 'granted',
                ad_personalization: 'granted',
            });
            onConsentUpdated();
        }
    } catch (e) {
        console.error(e);
    }
}

function loadPreferences() {
    console.log('Preferences action works!');

    try {
        // Create own function
        if (typeof updateLoadPreferences === 'function') {
            updateLoadPreferences();
        }
    } catch (e) {
        console.error(e);
    }
}

// Required for js_action_reject in coockie banner events
function rejectAnalytics() {
    console.log('Reject analytics action works!');

    try {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                analytics_storage: 'denied',
            });
            onConsentUpdated();
        }
    } catch (e) {
        console.error(e);
    }
}

function rejectMarketing() {
    console.log('Reject marketing action works!');

    try {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                ad_storage: 'denied',
                ad_user_data: 'denied',
                ad_personalization: 'denied',
            });
            onConsentUpdated();
        }
    } catch (e) {
        console.error(e);
    }
}

function rejectPreferences() {
    console.log('Reject preferences action works!');

    try {
        // Create own function
        if (typeof updateRejectPreferences === 'function') {
            updateRejectPreferences();
        }
    } catch (e) {
        console.error(e);
    }
}
