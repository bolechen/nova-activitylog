# Nova tool for activity log

A tool to activity logger to monitor the users of your Laravel Nova.

Behind the scenes [spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog) is used.

![screenshot](https://raw.githubusercontent.com/bolechen/nova-activitylog/master/docs/screenshot.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require bolechen/nova-activitylog
```

## How to use

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

Because backend we use the `spatie/laravel-activitylog` package, you need to do is let your model use the `Spatie\Activitylog\Traits\LogsActivity` trait.

Here's an example:

```php
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class NewsItem extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'text'];
    
    protected static $logAttributes = ['name', 'text'];
}
```

For more advanced usage can look at the doc: https://docs.spatie.be/laravel-activitylog/v3/advanced-usage/logging-model-events

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
