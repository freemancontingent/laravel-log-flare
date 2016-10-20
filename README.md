# laravel-log-flare
Checks logs on a schedule and emails alerts when errors are found.  Stay ahead of your important applications to respond quickly to issues.

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://raw.githubusercontent.com/freemancontingent/laravellogflare/master/LICENSE)

## Installation
You can install this package via Composer using:

```bash
composer require freemancontingent/laravellogflare
```

You must also install this service provider.

```php
// config/app.php
'providers' => [
    ...
    Freemancontingent\Laravellogflare\FrllflareServiceProvider::class,
    ...
];
```

To publish the config file to `app/config/logflare.php` and the custom email template to `resources/views/freemancontingent/logflare/email.blade.php` run:

```bash
php artisan vendor:publish --provider="Freemancontingent\Laravellogflare\FrllflareServiceProvider"
```

This will publish a file `app/config/logflare.php` in your config directory with the following contents:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Monolog Level check
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default Monolog levels that should be used
    | by the Laravel Log Flare.
    |
    | Supported: debug, info, notice, warning, error, critical, alert, emergency
    |
    */

    'level' => ['error','critical'],

    /*
    |--------------------------------------------------------------------------
    | Support email address
    |--------------------------------------------------------------------------
    |
    | Email address to receive the report.
    |
    |
    */

    'support_email' => '',

    /*
    |--------------------------------------------------------------------------
    | Support email name
    |--------------------------------------------------------------------------
    |
    | Email name
    |
    |
    */

    'support_email_name' => '',

    /*
    |--------------------------------------------------------------------------
    | Email subject
    |--------------------------------------------------------------------------
    |
    | Flare email subject
    |
    */

    'subject' => '',

    /*
    |--------------------------------------------------------------------------
    | Log viewer link
    |--------------------------------------------------------------------------
    |
    | Add inside the email template the link to view all log.
    |
    |
    */

    'log_viewer_link' => '',

    /*
    |--------------------------------------------------------------------------
    | Print info logs
    |--------------------------------------------------------------------------
    |
    | Print info logs when the function is called.
    |
    | Supported: true,false
    |
    */

    'log' => true,

    /*
    |--------------------------------------------------------------------------
    | Use custom email template
    |--------------------------------------------------------------------------
    |
    | Use custom email template inside freemancontingent/logsflare/
    |
    | Supported: true, false
    |
    */

    'custom_email_template' => false,
];
```

## Usage

After you've installed the package and filled in the values in the config-file working with this package will be a breeze. All the following examples use the facade. Don't forget to import it at the top of your schedule file `app/Console/Kernel.php`.

```php
use Freemancontingent\Laravellogflare\Flare;
...
$schedule->call(function(){
            $flare = new Flare();
            $flare->firing();
         })->cron('00 07 * * *');
...         
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Denis Oliveira](https://github.com/denisolvr)
- [All Contributors](../../contributors)


## License

The Log Flare is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
