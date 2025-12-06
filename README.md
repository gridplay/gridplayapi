# GridPlay API 4.x

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

This config file MUST contain your GPAPI_ID, GPAPI_SECRET & GPAPI_SLID api key in order for the request to go through.

You can get these from https://api.gridplay.net/generate a SecondLife account is REQUIRED!
Save these creds as they will only be shown ONCE!

Made for Laravel 12+.

### To use is easy
```php
GridPlay::Name2Key($user_name); // [put] string of the user's UUID key
GridPlay::Key2Name($user_uuid); // [put] string of the user's name
GridPlay::Wmps(); // [get] array shows a list of those using WMPS
GridPlay::getImg($texture_uuid); // [get] array ['img' => (url of pic)]
GridPlay::getProfPic($user_uuid); //[get] array ['img' => (url of pic)]
GridPlay::sendIM($towhouuid, $msg); //[put] array as ['status' => true] if successful
GridPlay::isOnline($uuid); //[put] array as ['isOnline' => true|false]
GridPlay::getGrid($userFromHeader); // [get] gets the grid's initals
GridPlay::getNews($site, $show, $page); // [get] returns news from the news api

Ventalkie::getChannel($search); // [get] array gets all the channels or of $search

GridHaul::getHub($search); // [get] array gets all hubs or of $search
GridHaul::getItems($search); // [get] array same for here
GridHaul::getJobs(); // [get] array shows all current jobs

```
ALL [put] functions requires config setup in config/gridplay.php

Please use Log::debug() or dd() to see what is returned before coding any further with these functions.
All data returned is in json format and should be in a array when returned to your function call.

### For errors....
Connection invalid = The connection to the gridplay server was invalid for some odd reason
Unable to connect = Unable to reach the gridplay server, please try again in afew minutes
Invalid key = Your ID and/or SECRET and/or SLID in gridplay.php config was invalid.

### Changelog

== 4.0 - Dec 6 2025 ==
* Directing ALL API's to the main to then be sent to the right site
* Refactored some functions
* name2key and key2name requires a special API key
* Hmac hashing has been tweeked for better security and handling

== 3.2 - Dec 5 2025 ==
* Reworked the API verication system. Now uses hash_hmac to encrypt keys
* The rework now requires your SL's UUID of your avatar
* API keys are now created at https://api.gridplay.net/generate

== 3.1.3 and 3.1.4 - Nov 13 2025 ==
* Fixed the default value in Name2Key to be NULL_KEY
* Took out the Log::debug out of Name2Key since its not needed
* Updated this README

== 3.1.2 - June 12 2025 ==
* Only added parseName($name) to help parse .resident out of someone's name

== 3.1.1 - April 23 2025 ==
* Support for Laravel 12
* Added in centralized achievements and levels with XP
* Added titles and achievements

== 3.1 - Dec 28 2024 ==
Last update for the year
* Now ALL API's will go to their own site. ie. ventalkie goes directly to the ventalkie.com website
* Took out the api key requirement for GET calls
* Did some code clean up to reduce memory usage
* Ventalkie API can ONLY fetch channel data, no able to send on a channel
* Took out referrence to Canadian Grid and Opensim due to the fact GridPlay is staying exclusivly to SL
* Updated the README to be more clear and updated of all the functions
* Moved key2name and name2key to be a put call to reduce spam

== 3.0.2 - Dec 26 2024 ==
* Added getting news from our API in a GET method

== 3.0.1 - Dec 23 2024 ==
* Added Multigrid support, converting user from header to initals
* Added GridHaul api back into the system, still gotta work on ventalkie
* Took out GridPhone since that ended sorry

== 3.0.0 - April 22 2024 ==
* Switched to support Laravel 11 plus

