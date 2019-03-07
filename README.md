# Nova tool for activity log

[![Latest Stable Version](https://poser.pugx.org/bolechen/nova-activitylog/v/stable)](https://packagist.org/packages/bolechen/nova-activitylog)
[![License](https://poser.pugx.org/bolechen/nova-activitylog/license)](https://packagist.org/packages/bolechen/nova-activitylog)

A tool to activity logger to monitor the users of your Laravel Nova.

- Behind the scenes [spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog) is used.



![screenshot](https://raw.githubusercontent.com/bolechen/nova-activitylog/master/docs/screenshot.png?20190308)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require bolechen/nova-activitylog
```

You can publish the migration with:
```bash
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="migrations"
```

*Note*: The default migration assumes you are using integers for your model IDs. If you are using UUIDs, or some other format, adjust the format of the subject_id and causer_id fields in the published migration before continuing.



After publishing the migration you can create the `activity_log` table by running the migrations:

```bash
php artisan migrate
```



You can optionally publish the config file with:

```bash
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="config"
```



**You can find More `Activitylog` documentation on https://docs.spatie.be/laravel-activitylog/v3.**



Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...

public function tools()
{
    return [
        // ...
        new \Bolechen\NovaActivitylog\NovaActivitylog(),
    ];
}
```



## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
