# GridPlay API 3.0.0 alpha 1

A API to use the GridPlay.net services for SecondLife residents.

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

currently in Alpha 1 its just the first section here that is working. All the GridPlay:: stuff
```php
GridPlay::Name2Key($user_uuid); // string
GridPlay::Key2Name($user_name); // string
GridPlay::Wmps(); // array
GridPlay::getImg($texture_uuid); // array
GridPlay::getProfPic($user_uuid); //[post] array
GridPlay::sendIM($towho, $msg); //[post] array
GridPlay::isOnline($uuid); //[post] array as ['isOnline' => true|false]

Ventalkie::sendmsg($chan, $nick, $msg); //[post] array
Ventalkie::getChannel($search); // array

// GridHaul will soon be deprecated for a new system so ya know eh
GridHaul::getHub($search); // array
GridHaul::getItems($search); // array
GridHaul::getJobs(); // array

GridPhone::getNumber($search); // array
// these functions will be rewriten in a later version
// Leaving the code in place so that its only server side to write
GridPhone::SendMsg($towho, $from, $msg); //[post] array
GridPhone::Call($towho, $from, $fromname); //[post] array
GridPhone::EndCall($towho, $from); //[post] array
GridPhone::Answer($towho, $from); //[post] array
```
ALL functions requires config setup in config/gridplay.php

Please see our wiki of what is returned in json format.
Please use Log::debug to see what is returned before coding any further with these functions.

### For errors....
Connection invalid = The connection to the gridplay server was invalid for some odd reason
Unable to connect = Unable to reach the gridplay server, please try again in afew minutes
Invalid key = Your ID and SECRET in gridplay.php config was invalid.

### Changelog
== 3.0.0 - April 22 2024 ==
* Switched to support Laravel 11 plus

