# Cookie Consent Banner in Laravel

CookieBuzz Cookie Consent Banner for Google Analytics and FacebookPixel.

## Install

```sh
composer create-project laravel/laravel:^13 test
cd test
composer require atomjoy/cookie-buzz
```

### After Install

```sh
# Publish images to public/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-images --force
```

## Configure

Change your cookie banner js actions.

```php
<head>
    <!-- CookieBuzz Js Actions Example -->
    @include('cookie-buzz::banner.actions')
    <!-- CookieBuzz Style -->
    @include('cookie-buzz::theme.default')
</head>

<body>
    <!-- CookieBuzz Banner -->
    @include('cookie-buzz::banner.default')
    <!-- CookieBuzz Preferences Button -->
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

## Publish Theme For Edit (optional)

```sh
# In public/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-images --force
# In resources/views/vendor/cookie-buzz
php artisan vendor:publish --tag=cookie-buzz-views --force
# In config/cookie-buzz.php
php artisan vendor:publish --tag=cookie-buzz-config --force

# Sample with provider package
php artisan vendor:publish --provider='CookieBuzz\CookieBuzzServiceProvider' --tag="images"
```

## Screen

<img src="https://raw.githubusercontent.com/atomjoy/cookie-buzz/refs/heads/main/cookie-buzz-banner.webp" width="100%">
