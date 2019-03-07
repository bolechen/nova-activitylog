# Nova tool for activity log

A tool to activity logger to monitor the users of your Laravel Nova.

Behind the scenes [spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog) is used.

![screenshot](https://raw.githubusercontent.com/bolechen/nova-activitylog/master/docs/screenshot.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require bolechen/nova-activitylog
```

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
