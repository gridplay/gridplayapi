# GridPlay API

A API to use the GridPlay.net services.

GridPlay.net is a Second Life company.

To use first install with composer
```
composer require chrisx84/gridplayapi
```

To use is easy, right now we just have support for GridPay

```php
GridPay::transfer($user_uuid, $payto_uuid, $amount);
GridPay::getBal($user_uuid);
```
