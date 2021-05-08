# GridPlay API

A API to use the GridPlay.net services.

GridPlay.net is a Second Life company.

To use first install with composer
```
composer require chrisx84/gridplayapi
```
Made for Laravel 6+.
If not using laravel or a version below 6 just add the aliases
```
"GridPlayAPI" => "GridPlayAPI\\GridPlayAPI",
"GridPay" => "GridPlayAPI\\GridPay",
"Ventalkie" => "GridPlayAPI\\Ventalkie",
"Groups" => "GridPlayAPI\\Groups"
```

To use is easy

```php
GridPay::transfer($sl_uuid, $payto_uuid, $amount);
GridPay::getBal($sl_uuid);
Ventalkie::sendmsg($chan, $nick, $msg);
Ventalkie::getChannel($search);
Groups::getGroup($group_uuid);
```
