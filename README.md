# GridPlay API 2.0.8

A API to use the GridPlay.net services for SecondLife residents.

To use first install with composer
```
composer require gridplay/gridplayapi
```
For config just do
```
php artisan vendor:publish --provider="GridPlayAPI\GPAPIServiceProvider"
```
This will create a config file located in ```config/gridplay.php```

This config file MUST contain your sl legacy name (Login name) in order for the request to go through.

Made for Laravel 6+.

### To use is easy

```php
GridPlay::Name2Key($user_uuid); // string
GridPlay::Key2Name($user_name); // string
GridPlay::Wmps(); // array
GridPlay::getImg($texture_uuid); // array
GridPlay::getProfPic($user_uuid); //[post] array
GridPlay::sendIM($towho, $msg); //[post] array
GridPlay::isOnline($uuid); //[post] array as ['isOnline' => true|false]

// transfer function has been deprecated
// due to security issues with it
GridPay::transfer($payto_uuid, $amount); // array
// getBal deprecated for security reasons
GridPay::getBal(); // array

Ventalkie::sendmsg($chan, $nick, $msg); //[post] array
Ventalkie::getChannel($search); // array

// GridHaul will soon be deprecated for a new system so ya know eh
GridHaul::getHub($search); // array
GridHaul::getItems($search); // array
GridHaul::getJobs(); // array

GridPhone::getNumber($search); // array
GridPhone::SendMsg($towho, $from, $msg); //[post] array
GridPhone::Call($towho, $from, $fromname); //[post] array
GridPhone::EndCall($towho, $from); //[post] array
GridPhone::Answer($towho, $from); //[post] array
```
* any function that does NOT have [post] in its comment is a GET method.
[post] functions requires config setup in config/gridplay.php

GRIDPAY API IS NOW DISCONTINUED FOR A NEW SYSTEM!

Please see our wiki of what is returned in json format.
Please use Log::debug to see what is returned before coding any further with these functions.

### For errors....
Connection invalid = The connection to the gridplay server was invalid for some odd reason
Unable to connect = Unable to reach the gridplay server, please try again in afew minutes
Invalid key = Your api_key in gridplay.php config was invalid. Please use your SL Legacy (login) name.

### Changelog
== 2.0.8 Apr 9 2024 ==
* GridPay now discontinued due to a revamp of the system and for security reasons
* isOnline($uuid) is now in to know if someone is online or not
* README updated with more info

== 2.0 Aug 28 2023 ==
* Now logging code changes to README file
* New URL for the api
* Reworked the API calls
* Rewrote how data is sent to the GridPlay server
* ALL API calls now require a valid SL name
* GridPay now uses your SL name for balance and giving money to someone (this is a security feature and yes a nerf)
