Star-Your-Up
===================

Start Your Start-Up Website
-------------------
This is an one-page-design Content Management System (CMS) for your start-up site. This CMS use [Startbootstrap-Agency](http://startbootstrap.com/template-overviews/agency/) as public template. 

Agency
-------------
[Agency](http://startbootstrap.com/template-overviews/agency/) is a responsive, one page portfolio theme for [Bootstrap](http://getbootstrap.com/) created by [Start Bootstrap](http://startbootstrap.com/). This theme features several content sections, a responsive portfolio grid with hover effects, full page portfolio item modals, a responsive timeline, and a working PHP contact form.

Start Bootstrap was created by and is maintained by **[David Miller](http://davidmiller.io/)**, Owner of [Blackrock Digital](http://blackrockdigital.io/).

* https://twitter.com/davidmillerskt
* https://github.com/davidtmiller

Start Bootstrap is based on the [Bootstrap](http://getbootstrap.com/) framework created by [Mark Otto](https://twitter.com/mdo) and [Jacob Thorton](https://twitter.com/fat).

Installation
------------

The preferred way to install this CMS is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer global require "fxp/composer-asset-plugin:^1.2.0"
composer create-project --prefer-dist hoaaah/start-your-up [app_name]
```

Then create your database and setup your database config in \common\config\main-local.php

```php
<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=your_db_name',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];

```

Then run migration to create table in selected database.

```bash
php yii migrate
```
This application using google-maps-api, if you don't have one, please visit [google-maps-api](https://developers.google.com/maps/documentation/javascript/get-api-key). After you get your api-key, set your api-key in \common\config\params.php. The preferred way to save your params are in params-local.php

```php
<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'uploadPath' => \Yii::getAlias('@common').'\web\\',
    'uploadUrl' => 'change-your-upload-url-here',
    // it recomended to create a subdomain to access static content or dynamic user generated content. 
    'googleApiKey' => 'your-google-api-here',
    'initialMapLatitude' => 'your-initial-map-latitude-here',
    'initialMapLongitude' => 'your-initial-map-longitude-here',
    'initialMapZoom' => 'your-initial-map-zoom-here',
];
```

And finally you can access your application in http://your_app_path/frontend/web/ for frontend side, and http://your_app_path/backend/web/ for backend site.

Usage
-----

For first time use, you need to create your credential. Visit http://your_app_path/frontend/web/site/signup . 

To make your maps more readable, change initialMapZoom param.

and just in case you want to use vendor image, to call any content of vendor image you can use this

```php
$image = hoaaah\agency\AgencyAsset::register($this);

<img src=<?= $agency->baseUrl.'/img/portfolio/startup-framework.png' ?> class="img-responsive" alt="">
```
it will call startup-framework.png from /vendor/hoaaah/yii2-startbootstrap-agency/assets/img/portofolio/startup-framework.png

## Creator

This Start-Your-Up CMS was created by and is maintained by **[Heru Arief Wijaya](http://belajararief.com/)**.

* https://twitter.com/hoaaah
* https://github.com/hoaaah