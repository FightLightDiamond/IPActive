# IP Active
This package makes it easy to ip access limit for time
## Postcardware
You're free to use this package (it's MIT-licensed), but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.
- Author: Fight Light Diamond <i.am.m.cuong@gmail.com>
- MIT: 2e566161fd6039c38070de2ac4e4eadd8024a825

## Requires
- Laravel 5.x

## Install
You can install the package via composer:
`composer require cuongpm/ip-active`

## Usage
The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:

```
'providers' => [
    // ...
    IPActive\IPActiveServiceProvider::class,
];
```

Run migration `ip_active_logs`
```angular2html
php artisan migrate
```

You can publish the migration with:
```angular2html
php artisan vendor:publish
```

Config with `ip-active.php`:
```
return [
    'ip_active_log_clean_cron' => env('IP_ACTIVE_CLEAN_CRON', '0 0 * * *'),

    'times' => [
        'register' => env('REGISTER_TIME', 30),
        'resend_confirmation_email' => env('RESEND_CONFIRMATION_EMAIL_TIME', 30),
        'send_reset_password' => env('SEND_RESET_PASSWORD_TIME', 30),
    ],
];
```

Example for add middleware to register
```angular2html
Route({ // do something})->middleware(IPActive\Define::middleware('register'))
Route({ // do something})->middleware(IPActive\Define::middleware('resend_confirmation_email'))
Route({ // do something})->middleware(IPActive\Define::middleware('send_reset_password'))
```
