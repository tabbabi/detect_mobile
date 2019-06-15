detect_mobile
=============
drupal 8 module for detect mobile devices.

This is a lightweight mobile detection based on the [Mobile_Detect.php](http://mobiledetect.net/) library.

PHP examples
------------

### Check type device
``` php
$mobileDetector = \Drupal::service('mobile_detect');
$mobileDetector->isMobile();
$mobileDetector->isTablet()
```

### Check phone
**is[iPhone|HTC|Nexus|Dell|Motorola|Samsung|Sony|Asus|Palm|Vertu|GenericPhone]**

``` php
$mobileDetector->isIphone();
$mobileDetector->isHTC();
etc.
```

### Check tablet
**is[BlackBerryTablet|iPad|Kindle|SamsungTablet|HTCtablet|MotorolaTablet|AsusTablet|NookTablet|AcerTablet|
YarvikTablet|GenericTablet]**

```php
$mobileDetector->isIpad();
$mobileDetector->isMotorolaTablet();
etc.
```

### Check mobile OS
**is[AndroidOS|BlackBerryOS|PalmOS|SymbianOS|WindowsMobileOS|iOS|badaOS]**

```php
$mobileDetector->isAndroidOS();
$mobileDetector->isIOS();
```

Twig Helper
-----------

```jinja
{% if is_mobile() %}
{% if is_tablet() %}
{% if is_device('iphone') %} 
{% if is_ios() %}
{% if is_android_os() %}
```

Redirect to mobile domain
-------------------------------------------------
To enable redirect use the configuration form here /admin/config/system/detect_mobile

enter the domain for the desktop & mobile without 'http' for example 'example.com'

TODO
---------

* ~~redirect to mobile and tablet~~
* Write tests


HOW TO INSTALL
-------------------------------------------------

With composer:

1) add the git package to ```composer.json```:
``` json
    "repositories": [
        ...
        {
            "type": "package",
            "package": {
                "name": "tabbabi/detect_mobile",
                "version": "dev-master",
                "type":"drupal-module",
                "source": {
                    "url": "https://github.com/tabbabi/detect_mobile.git",
                    "type": "git",
                    "reference": "master"
                }
            }
        }
        ...
    ]
```
2) require the dependencies:
``` shell
composer require mobiledetect/mobiledetectlib
composer require tabbabi/detect_mobile
```
3) enable the module
