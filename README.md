# GridPlay API

A API to use the GridPlay.net services.

GridPlay.net is a Second Life company.

To use first install with composer
```
composer require chrisx84/gridplayapi
```
Made for Laravel 6+, if not using laravel or a version below 6 just add the alias
```
"GridPlayAPI" => "GridPlayAPI\\GridPlayAPI",
"GridPay" => "GridPlayAPI\\GridPay"
```

To use is easy, right now we just have support for GridPay

```php
GridPay::transfer($user_uuid, $payto_uuid, $amount);
GridPay::getBal($user_uuid);
Ventalkie::sendmsg($chan, $nick, $msg);
Ventalkie::getChannel($search);
```
