# GridPlay API

A API to use the GridPlay.net services.

GridPlay.net is a Second Life company.

To use first install with composer
```
composer require gridplay/gridplayapi
```
For config just do
```
php artisan vendor:publish --provider="GridPlayAPI\GPAPIServiceProvider"
```
This will create a config file located in ```config/gridplay.php```

Made for Laravel 6+.

To use is easy

```php
GridPlay::Name2Key($user_uuid);
GridPlay::Key2Name($user_name);
GridPlay::Wmps();
GridPay::transfer($sl_uuid, $payto_uuid, $amount);
GridPay::getBal($sl_uuid);
Ventalkie::sendmsg($chan, $nick, $msg);
Ventalkie::getChannel($search);
Groups::getGroup($group_uuid);
GridHaul::getHub($search);
```
