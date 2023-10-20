# GridPlay API 2.0

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
GridPlay::getProfPic($user_uuid); // array
GridPlay::sendIM($towho, $msg); // array
GridPlay::GetSLAvatars($gpid); // array
GridPay::transfer($payto_uuid, $amount); // array
GridPay::getBal(); // array
Ventalkie::sendmsg($chan, $nick, $msg); // array
Ventalkie::getChannel($search); // array
GridHaul::getHub($search); // array
GridHaul::getItems($search); // array
GridHaul::getJobs(); // array
GridPhone::getNumber($search); // array
GridPhone::SendMsg($towho, $from, $msg); // array
GridPhone::Call($towho, $from, $fromname); // array
GridPhone::EndCall($towho, $from); // array
GridPhone::Answer($towho, $from); // array
```
Please see our wiki of what is returned in json format.
Please use Log::debug to see what is returned before coding any further with these functions.

### For errors....
Connection invalid = The connection to the gridplay server was invalid for some odd reason
Unable to connect = Unable to reach the gridplay server, please try again in afew minutes
Invalid key = Your api_key in gridplay.php config was invalid. Please use your SL Legacy (login) name.

### Changelog
== 2.0 Auth 28 2023 ==
* Now logging code changes to README file
* New URL for the api
* Reworked the API calls
* Rewrote how data is sent to the GridPlay server
* ALL API calls now require a valid SL name
* GridPay now uses your SL name for balance and giving money to someone (this is a security feature and yes a nerf)
