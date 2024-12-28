# GridPlay API 3.1

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
GridPlay::Name2Key($user_uuid); // [get] string
GridPlay::Key2Name($user_name); // [get] string
GridPlay::Wmps(); // [get] array
GridPlay::getImg($texture_uuid); // [get] array
GridPlay::getProfPic($user_uuid); //[get] array
GridPlay::sendIM($towho, $msg); //[put] array
GridPlay::isOnline($uuid); //[get] array as ['isOnline' => true|false]
GridPlay::getGrid($userFromHeader); // [get] gets the grid's initals
GridPlay::getNews($site, $show, $page); // [get] returns news from the news api

Ventalkie::getChannel($search); // [get] array

GridHaul::getHub($search); // [get] array
GridHaul::getItems($search); // [get] array
GridHaul::getJobs(); // [get] array

```
ALL [put] functions requires config setup in config/gridplay.php

Please use Log::debug() or dd() to see what is returned before coding any further with these functions.
All data returned is in json format and should be in a array when returned to your function call.

### For errors....
Connection invalid = The connection to the gridplay server was invalid for some odd reason
Unable to connect = Unable to reach the gridplay server, please try again in afew minutes
Invalid key = Your ID and SECRET in gridplay.php config was invalid.

### Changelog

== 3.1 - Dec 28 2024 ==
Last update for the year
* Now ALL API's will go to their own site. ie. ventalkie goes directly to the ventalkie.com website
* Took out the api key requirement for GET calls
* Did some code clean up to reduce memory usage
* Ventalkie API can ONLY fetch channel data, no able to send on a channel
* Took out referrence to Canadian Grid and Opensim due to the fact GridPlay is staying exclusivly to SL
* Updated the README to be more clear and updated of all the functions

== 3.0.2 - Dec 26 2024 ==
* Added getting news from our API in a GET method

== 3.0.1 - Dec 23 2024 ==
* Added Multigrid support, converting user from header to initals
* Added GridHaul api back into the system, still gotta work on ventalkie
* Took out GridPhone since that ended sorry

== 3.0.0 - April 22 2024 ==
* Switched to support Laravel 11 plus

