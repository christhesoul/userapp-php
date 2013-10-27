userapp-php is a PHP wrapper for UserApp.io
===========================================

This is a wrapper for using PHP with https://www.userapp.io/

Without wanting to be too much of self-deprecating wally, I'm not a great developer, so any constructive feedback is very welcome.

Send it to chris [at] wearecondiment [dot] com

Dependencies
============

I'm using UniRest (a lightweight HTTP request library). This dependency is referenced in the composer.json file, so if you have Composer (http://getcomposer.org/) installed, then I think you can just run `composer install` when inside this directory.

Usage
=====

User class with static methods
------------------------------

`User::login($login,$password)`

Logs the user in, responds with the token, starts session - stored in `$_SESSION['token']`.

`User::logout()`

Destroys the token for the current session and `$_SESSION['token']`.

`User::resetPassword($login)`

Takes one argument, being the username of the forgetful user. If successful, responds with token.

`User::changePassword($new_password,$password_token)`

Once you've got a password reset token from the `resetPassword()` method (see above), you can use this to reset a password here. Obviously, you'll need the user's preferred new password, too.

