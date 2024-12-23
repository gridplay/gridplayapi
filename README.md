# GridPlay API 3.0.1

A API to use the GridPlay.net services for SecondLife and opensim residents.

Currently only working for SecondLife as we are still working on getting code writen to support opensim

To use first install with composer
```sh
composer require gridplay/gridplayapi
```
For config just do
```sh
php artisan vendor:publish --provider="GridPlayAPI\GPAPIServiceProvider"
```
This will create a config file located in ```config/gridplay.php```

This config file MUST contain your GPaONE ID and secret API key in order for the request to go through.

Made for Laravel 11+.

### To use is easy
```php
GridPlay::Name2Key($user_uuid); // string
GridPlay::Key2Name($user_name); // string
GridPlay::Wmps(); // array
GridPlay::getImg($texture_uuid); // array
GridPlay::getProfPic($user_uuid); //[post] array
GridPlay::sendIM($towho, $msg); //[post] array
GridPlay::isOnline($uuid); //[post] array as ['isOnline' => true|false]
GridPlay::getGrid($userFromHeader); // gets the grid's initals

Ventalkie::sendmsg($chan, $nick, $msg); //[post] array
Ventalkie::getChannel($search); // array

// GridHaul will soon be deprecated for a new system so ya know eh
GridHaul::getHub($search); // array
GridHaul::getItems($search); // array
GridHaul::getJobs(); // array

```
ALL functions requires config setup in config/gridplay.php

Please use Log::debug() or dd() to see what is returned before coding any further with these functions.
All data returned is in json format and should be auto put into arrays

### For errors....
Connection invalid = The connection to the gridplay server was invalid for some odd reason
Unable to connect = Unable to reach the gridplay server, please try again in afew minutes
Invalid key = Your ID and SECRET in gridplay.php config was invalid.

### Changelog

== 3.0.1 - Dec 23 2024 ==
* Added Multigrid support, converting user from header to initals
* Added GridHaul api back into the system, still gotta work on ventalkie
* Took out GridPhone since that ended sorry

== 3.0.0 - April 22 2024 ==
* Switched to support Laravel 11 plus

