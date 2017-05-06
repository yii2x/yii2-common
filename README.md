YII2 Common
===========
YII2 Common

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2x/yii2-common "*"
```

or add

```
"yii2x/yii2-common": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :


Model Configuration:
--------------------
```php

    public function behaviors()
    {
        return [           

	    [
                'class' => \yii2x\common\behaviors\IpAddressBlameableBehavior::className(),
                'createdIpAttribute' => 'created_ip',
                'updatedIpAttribute' => 'updated_ip',
            ],                       
            [
                'class' => \yii2x\common\behaviors\JsonFieldBehavior::className(),
                'attributes' => ['params']
            ]
        ];
    }

```