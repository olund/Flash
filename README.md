Flash
=========
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/olund/Flash/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/olund/Flash/?branch=master)
[![Build Status](https://travis-ci.org/olund/Flash.svg?branch=master)](https://travis-ci.org/olund/Flash)
[![Code Coverage](https://scrutinizer-ci.com/g/olund/Flash/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/olund/Flash/?branch=master)
You can also find this on [Packagist](https://packagist.org/packages/olund/flash)

```
 _____ _           _
|  ___| | __ _ ___| |__
| |_  | |/ _` / __| '_ \
|  _| | | (_| \__ \ | | |
|_|   |_|\__,_|___/_| |_|
```

A small PHP Flash module for [Anax-MVC](https://github.com/olund/Anax-MVC) based on sessions.


Preview
======
![alt tag](https://i.imgur.com/TCKCcqq.png)


Instructions for Anax-MVC
=========
Add the following to your frontcontroller.
```php
// Start session.
$app->withSession();

// Set flash as a shared service.
$di->setShared('flash', function () {
    $flash = new \Anax\Flash\CFlash();
    return $flash;
});


```

You can now use Flash

```php
$app->flash->success('Success message');
$app->flash->error('Error message');
$app->flash->notice('Notice message');
$app->flash->warning('Warning message');

```

To get the html use:
```php
$app->flash->get()
```

Example:

```php
// Create a route.
$app->router->add('flash', function () use ($app) {
    // Sets the title
    $app->theme->setTitle('Flash');

    // Add some flash messages
    $app->flash->success('This is a success message');
    $app->flash->error('Error message');
    $app->flash->notice('Notice message');
    $app->flash->warning('Warning message');
    $app->flash->success('Success again');

    // Call the flash->get() method.
    $app->views->addString($app->flash->get(), 'main');
    // Use $app->flash->get(false) if you dont have FontAwesome.
});
```

The output:
```html
<div class='errorMessage'>Error message</div>
<div class='successMessage'>Success message</div>
<div class='noticeMessage'>Notice message</div>
<div class='warningMessage'>Warning message</div>

```
