Scheduling task manager for open-developer

A web interface for manage task scheduling in laravel.

## Screenshot

![extention-schedualing](https://user-images.githubusercontent.com/86517067/153514589-e6204239-d227-483a-bf4d-c5da2720f038.png)

## Installation

```
composer require open-developer-ext/scheduling
```
```
php artisan developer:import scheduling
```

Open `http://your-host/developer/scheduling`.

Try to add a scheduling task in `app/Console/Kernel.php` like this:

```php
class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->everyTenMinutes();

        $schedule->command('route:list')->dailyAt('02:00');
    }
}

```

And you can find these tasks in scheduling panel.

Debugging
------------
If console shows errors like: `sh: : command not found`
Try adding this your .env file: `PHP_BINARY=/path/to/your/php/binaray/`
