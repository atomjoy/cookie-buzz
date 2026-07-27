# Cookie Consent Banner in Laravel

CookieBuzz Cookie Consent Banner for Google Analytics and FacebookPixel (dark mode and translations).

## Install

```sh
composer create-project laravel/laravel:^13 test
cd test
composer require atomjoy/cookie-buzz
```

### After install

```sh
# Publish images to public/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-images --force
```

## Configure

Change your cookie banner js actions.

```php
<head>
    <!-- CookieBuzz Js Actions -->
    // @include('cookie-buzz::banner.actions', ['gtmId' => 'G-XXXXXXX', 'pixelId' => 'F-XXXXXXX'])
    <!-- CookieBuzz Js Actions Example -->
    @include('cookie-buzz::banner.actions-mini')
    <!-- CookieBuzz Css Style -->
    @include('cookie-buzz::theme.default')
</head>

<body>
    <!-- CookieBuzz Banner -->
    @include('cookie-buzz::banner.default')
    <!-- CookieBuzz Preferences Button -->
    @include('cookie-buzz::banner.button')
</body>
```

## Js action example

Save to **view/components/gtag.blade.php** and add to page **head** tag.

```php
<!-- @include('components.gtag', ['gtmId' => 'GTM-XXXXXXX']) -->

@props([
    'gtmId' => null, // Set TAG_ID GTM
    'pixelId' => null, // Set Pixel Id
])

@if($gtmId)
<!-- INIT GOOGLE TAG (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtmId }}"></script>
<script>
    window.dataLayer = window.dataLayer || []
    function gtag() {
        dataLayer.push(arguments)
    }
    gtag('js', new Date())
    gtag('config', '{{ $gtmId }}')
    gtag('consent', 'default', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        analytics_storage: 'denied',
    })
</script>
@endif

@if($pixelId)
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('consent', 'revoke');
    fbq('init', '{{ $pixelId }}');
    fbq('track', 'PageView');
</script>
@endif

<script>
function loadAnalytics() {
    console.log("Analytics action works!");

    gtag('consent', 'update', {
        analytics_storage: 'granted',
    });
}

function loadMarketing() {
    console.log("Marketing action works!");

    gtag('consent', 'update', {
        ad_storage: 'granted',
        ad_user_data: 'granted',
        ad_personalization: 'granted',
    });

    // Facebook
    fbq('consent', 'grant');
}

function rejectAnalytics() {
    console.log("Analytics action works!");

    gtag('consent', 'update', {
        analytics_storage: 'denied',
    });
}

function rejectMarketing() {
    console.log("Marketing action works!");

    gtag('consent', 'update', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
    });

    // Facebook
    fbq('consent', 'revoke');
}
</script>
```

## Run

```sh
npm install
npm run build
php artisan serve
php artisan serve --host=localhost --port=8000
```

## Publish config, themes, translations (optional)

```sh
# In public/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-images --force
# In resources/views/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-views --force
# In config/cookie-buzz.php
php artisan vendor:publish --tag=cookie-buzz-config --force
# In lang/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-lang --force

# Sample with provider package
php artisan vendor:publish --provider='CookieBuzz\CookieBuzzServiceProvider' --tag="images"
```

## Google gtag manager event

```html
<script>
    function triggerEvents() {
        // With push
        window.dataLayer.push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js',
        });

        // With gtag
        gtag('event', 'button_click', {
            id: 'contact1',
            name: 'Form Contact',
        });

        gtag('event', 'signup_newsletter', {
            method: 'web',
        });
    }

    function handleUserLogin(userId) {
        // Example function called after successful login
        if (userId) {
            gtag('set', { user_id: userId });
            console.log('User ID set for GA:', userId);

            // You can also send a login event
            gtag('event', 'login', { method: 'your_login_method' });
        }
    }

    function handleUserLogout() {
        // Example function called after logout
        gtag('set', { user_id: null });
        console.log('User ID cleared for GA.');

        // You can also send a logout event
        gtag('event', 'logout');
    }

    gtag('get', target, 'client_id', (id) => {
        document.cookie = `ga_cid=${id}; path=/; SameSite=Lax`;
    });
    gtag('get', target, 'session_id', (id) => {
        document.cookie = `ga_sid=${id}; path=/; SameSite=Lax`;
    });
</script>
```

## Screen

<img src="https://raw.githubusercontent.com/atomjoy/cookie-buzz/refs/heads/main/cookie-buzz-banner.webp" width="100%">
<img src="https://raw.githubusercontent.com/atomjoy/cookie-buzz/refs/heads/main/cookie-buzz-banner-dark.webp" width="100%">
