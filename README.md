Flash
=========
A small PHP module for [Anax-MVC](https://github.com/olund/Anax-MVC) based on sessions.


Preview
======
![alt tag](https://i.imgur.com/TCKCcqq.png)


Instructions for Anax-MVC
=========
Add the following to your frontcontroller.
```
// Start session.
$app->withSession();

// Set flash as a shared service.
$di->setShared('flash', function () {
    $flash = new \Anax\Flash\CFlash();
    return $flash;
});


```

You can now use Flash

```
$app->flash->success('Success message');
$app->flash->error('Error message');
$app->flash->notice('Notice message');
$app->flash->warning('Warning message');

```

To get the html use:
```
$app->flash->get()
```

Example:

```
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
```
<div class='errorMessage'>Error message</div>
<div class='successMessage'>Success message</div>
<div class='noticeMessage'>Notice message</div>
<div class='warningMessage'>Warning message</div>

```
