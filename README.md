# Cookie Consent Banner in Laravel (GTM)

Cookie Buzz is cookie consent website banner for Google Tag Manager in Laravel blade component (dark mode and translations).

## Install

```sh
composer create-project laravel/laravel:^13 test
cd test
composer require atomjoy/cookie-buzz
```

### After install (required)

```sh
# Publish styles, js, images to public/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-public --force
```

## Add blade components

```php
<head>
    <!-- CookieBuzz GoogleTagManager -->
    @include('cookie-buzz::banner.gtm', ['gtagId' => 'GTM-XXXXXXX'])

    <!-- CookieBuzz CSS style -->
    @include('cookie-buzz::theme.default')
</head>

<body>
    <!-- CookieBuzz GoogleTagManager noscript -->
    @include('cookie-buzz::banner.gtm-noscript', ['gtmId' => 'GTM-XXXXXXX'])

    <!-- PAGE CONTENT HERE -->

    <!-- CookieBuzz Banner -->
    @include('cookie-buzz::banner.gtm-banner')

    <!-- CookieBuzz Preferences button -->
    @include('cookie-buzz::banner.button')
</body>
```

## Run

```sh
npm install
npm run build
php artisan serve
php artisan serve --host=localhost --port=8000
```

## Publish images, config, views, translations (optional)

```sh
# In public/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-public --force
# In resources/views/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-views --force
# In config/cookie-buzz.php
php artisan vendor:publish --tag=cookie-buzz-config --force
# In lang/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-lang --force

# Your users can also publish all publishable files
php artisan vendor:publish --provider='CookieBuzz\CookieBuzzServiceProvider' --force
```

## Csp for banner

Add AppSmartPolicy.php in config/csp.php file.

```sh
atomjoy/csp-spatie
```

## GoogleTagManager Custom Events

```html
<script>
    function setBeforeInitGtm() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ user_id: '123' }); // No event here
    }

    function triggerLogin() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event: 'login', user_id: '123', user_email: 'test@example.com' });
    }

    function triggerPurchase() {
        window.dataLayer.push({
            event: 'purchase',
            user_id: '123',
            item: {
                id: 25,
                price: 99.99,
            },
            time: new Date().getTime(),
        });

        gtag('event', 'purchase', {
            user_id: '123',
            item: {
                id: 25,
                price: 99.99,
            },
            time: new Date().getTime(),
        });
    }

    function triggerSubscribe() {
        gtag('event', 'signup_newsletter', {
            method: 'web',
            email: 'test@example.com',
        });
    }

    function handleUserLogin(userId, userEmail) {
        // Example function called after successful login
        if (userId) {
            gtag('set', { user_id: userId });
            console.log('User ID set for GA:', userId);

            // You can also send a login event
            gtag('event', 'login', { user_id: userId, user_email: userEmail });
        }
    }

    function handleUserLogout() {
        // Example function called after logout
        gtag('set', { user_id: null, user_email: null });
        console.log('User ID cleared for GA.');

        // You can also send a logout event
        gtag('event', 'logout');
    }

    function handleGtmCid() {
        // Save GTM clientId, sessionId to local cookie
        gtag('get', target, 'client_id', (id) => {
            document.cookie = `ga_cid=${id};path=/;SameSite=Lax`;
        });

        gtag('get', target, 'session_id', (id) => {
            document.cookie = `ga_sid=${id};path=/;SameSite=Lax`;
        });
    }
</script>
```

## Screen

<img src="https://raw.githubusercontent.com/atomjoy/cookie-buzz/refs/heads/main/cookie-buzz-banner.webp" width="100%">
<img src="https://raw.githubusercontent.com/atomjoy/cookie-buzz/refs/heads/main/cookie-buzz-banner-dark.webp" width="100%">
