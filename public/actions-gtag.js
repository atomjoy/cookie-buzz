// Actions list
const actionsList = {
    loadAnalytics,
    loadMarketing,
    rejectAnalytics,
    rejectMarketing,
    loadPreferences,
    rejectPreferences,
};

function checkFacebookPixel() {
    if (window.fbq && window.fbq.getState) {
        const pixels = window.fbq.getState().pixels;
        if (pixels.length === 0) {
            console.error('Pixel not initialized!');
        } else {
            console.log('Pixel loaded:', pixels);
        }
    }
}

function loadAnalytics() {
    console.log('Analytics action works!');

    try {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                analytics_storage: 'granted',
            });
        }
    } catch (e) {
        console.log(e);
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
        }

        // Facebook
        if (typeof fbq === 'function' && typeof fbq.getState === 'function') {
            fbq('consent', 'grant');
        }
    } catch (e) {
        console.log(e);
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

function rejectAnalytics() {
    console.log('Reject analytics action works!');

    try {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                analytics_storage: 'denied',
            });
        }
    } catch (e) {
        console.log(e);
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
        }

        // Facebook
        if (typeof fbq === 'function' && typeof fbq.getState === 'function') {
            fbq('consent', 'revoke');
        }
    } catch (e) {
        console.log(e);
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
