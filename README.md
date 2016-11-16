Metatags plugin for CakePHP 3
============================


[![Build status][build svg]][build status]
[![Code coveralls][coveralls svg]][coveralls]
[![License][license svg]][license]
[![Latest stable version][releases svg]][releases]
[![Total downloads][downloads svg]][downloads]

[build status]: https://travis-ci.org/ciricihq/cake-metatags
[coveralls]: https://coveralls.io/github/ciricihq/cake-metatags
[license]: https://github.com/ciricihq/cake-metatags/blob/master/LICENSE.md
[releases]: https://github.com/ciricihq/cake-metatags/releases
[downloads]: https://packagist.org/packages/ciricihq/cake-metatags

[build svg]: https://img.shields.io/travis/ciricihq/cake-metatags/master.svg?style=flat-square
[coveralls svg]: https://img.shields.io/coveralls/c/github/ciricihq/cake-metatags/master.svg?style=flat-square
[license svg]: https://img.shields.io/github/license/ciricihq/cake-metatags.svg?style=flat-square
[releases svg]: https://img.shields.io/github/release/ciricihq/cake-metatags.svg?style=flat-square
[downloads svg]: https://img.shields.io/packagist/dt/ciricihq/cake-metatags.svg?style=flat-square

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require ciricihq/cake-metatags
```

Configuration
-------------

First you need to load the plugin. To do so, edit your `bootstrap.php` file and
add line below:

```php
Plugin::load('Metatags', ['bootstrap' => true]);
```