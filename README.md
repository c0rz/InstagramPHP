# Instagram PHP

This library is based on the Instagram web version. We develop it because nowadays it is hard to get an approved Instagram application. The purpose is to support every feature that the web desktop and mobile version support.

## Dependencies

- PHP >= 7.2

## Code Example

```php
$instagram = new Instagram();
$instagram->login();
$login = json_decode($instagram->login_account($username, $password));
echo $login;
```

## Installation

```sh
git clone https://github.com/c0rz/InstagramPHP.git
```

## Examples

See examples [here](https://github.com/c0rz/InstagramPHP/tree/main/example).
