<?php

/**
 * Cookie Buzz - Consent Cookie Configuration
 *
 * @package atomjoy/cookie-buzz
 * @author Atomjoy
 * @license MIT
 */

return [
    // Cookie list type (summary, minimal)
    'cookie_list' => env('COOKIE_BUZZ_LIST', 'summary'),

    // Cookie svg icon
    'cookie_icon_public_path' => 'vendor/cookie-buzz/cookie.svg',

    // Cookie Consent Prefix
    'cookie_prefix' => env('COOKIE_BUZZ_PREFIX', 'laravel_app'),

    // Enable or disable the cookie consent banner
    'enabled' => env('COOKIE_BUZZ_ENABLED', true),

    // Cookie lifetime in days
    'cookie_lifetime' => env('COOKIE_BUZZ_LIFETIME', 365),

    // Cookie banner title text
    'cookie_title' => "Cookie Disclaimer",

    // Cookie banner description text
    'cookie_description' => "This website uses cookies to enhance your browsing experience, analyze site traffic, and personalize content. By continuing to use this site, you consent to our use of cookies.",

    // Accept all cookies button text
    'cookie_accept_btn_text' => 'Accept all',

    // Reject all cookies button text
    'cookie_reject_btn_text' => 'Reject all',

    // Manage preferences button text
    'cookie_preferences_btn_text' => 'Manage preferences',

    // Toggle preferences link text
    'cookie_preferences_toggle_text' => '🍪 Cookie Preferences',

    // Enable preferences modal
    'cookie_modal_enabled' => env('COOKIE_BUZZ_PREFERENCES_ENABLED', true),

    // Preferences modal title text
    'cookie_modal_title' => 'Cookie Preferences',

    // Preferences modal introduction text
    'cookie_modal_description' => 'You can customize your cookie preferences below.',

    /**
     * Cookie categories configuration
     *
     * Defines the different types of cookies users can manage.
     *
     * @category necessary - Essential cookies that cannot be disabled
     * @category analytics - Cookies used for tracking and analytics
     * @category marketing - Cookies used for advertising
     * @category preferences - Cookies for user preference storage
     */
    'cookie_categories' => [
        'necessary' => [
            'enabled' => true,
            'locked' => true,
            // 'js_action' => null,
            // 'js_action_reject' => null,
            'title' => 'Essential Cookies',
            'description' => 'These cookies are essential for the website to function properly.',
        ],
        'analytics' => [
            'enabled' => env('COOKIE_BUZZ_ANALYTICS', true),
            'locked' => false,
            'js_action' => 'loadAnalytics',
            'js_action_reject' => 'rejectAnalytics',
            'title' => 'Analytics Cookies',
            'description' => 'These cookies help us understand how visitors interact with our website.',
        ],
        'marketing' => [
            'enabled' => env('COOKIE_BUZZ_MARKETING', true),
            'locked' => false,
            'js_action' => 'loadMarketing',
            'js_action_reject' => 'rejectMarketing',
            'title' => 'Marketing Cookies',
            'description' => 'These cookies are used for advertising and tracking purposes.',
        ],
        'preferences' => [
            'enabled' => env('COOKIE_BUZZ_PREFERENCES', false),
            'locked' => false,
            // 'js_action' => null,
            // 'js_action_reject' => null,
            'title' => 'Preferences Cookies',
            'description' => 'These cookies allow the website to remember user preferences.',
        ]
    ],

    /**
     * Policy links configuration
     *
     * Links to legal documents displayed in the cookie banner.
     *
     * @item text - Display text for the link
     * @item link - URL to the policy document
     */
    'policy_links' => [
        [
            'text' => 'Privacy Policy',
            'link' => env('COOKIE_BUZZ_PRIVACY_POLICY_URL', '/privacy-policy')
        ],
        [
            'text' => 'Terms and Conditions',
            'link' => env('COOKIE_BUZZ_TERMS_URL', '/terms-and-conditions')
        ],
    ],
];
