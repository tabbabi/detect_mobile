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

TODO
---------

* redirect to mobile and tablet
* Write tests
