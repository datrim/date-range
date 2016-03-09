# DateRange

DateRange is a simple package for creating and using a starting and ending date.

## Installation

### Composer

From the command line, run:

```
composer require datrim/date-range
```

## Usage

### The Basics

With the package now installed, you may use the two classes like so:

### Create date range for today (00:00 - 23:59)

```php
use Datrim\DateRange\DateRange;

$today = DateRange::today();
```

### Create date range for last week

```php
use Datrim\DateRange\DateRange;

$today = DateRange::lastWeek();
```

### Create date range for this week

```php
use Datrim\DateRange\DateRange;

$today = DateRange::thisWeek();
```

### Create date range for last month

```php
use Datrim\DateRange\DateRange;

$today = DateRange::lastMonth();
```

### Create date range for this month

```php
use Datrim\DateRange\DateRange;

$today = DateRange::thisMonth();
```

### Get the difference between two dates

```php
use Datrim\DateRange\DateRange;

$today = DateRange::thisWeek();
$diff  = $today->diff();
```

### Also included is a default timezone class.

The timezone class is used by the DateRange when creating new Carbon instances. Before using the DateRange class, set the default timezone as follows:

```php
use Datrim\DateRange\dt;
use Datrim\DateRange\DateRange;

dt::defaultTimezone('Europe/Berlin');

$today = DateRange::thisWeek();
```

To get the default timezone, call the dt::defaultTimezone method with no parameters:

```php
use Datrim\DateRange\dt;

$timezone = dt::defaultTimezone();
```

The dt class has several static methods that wrap Carbon creation methods:

```php
dt::now($tz = null)
dt::parse($time = null, $tz = null)
dt::today($tz = null)
dt::tomorrow($tz = null)
dt::yesterday($tz = null)
```

A different timezone string may be passed to all the above methods to override the default timezone.

That's it!

### License

The HttpData package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
