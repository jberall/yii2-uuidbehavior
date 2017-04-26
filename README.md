Yii2 UUID Behavior
==================
Attaches a Ramsey V4::UUID 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jberall/yii2-uuidbehavior "*"
```

or add

```
"jberall/yii2-uuidbehavior": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :
	Where _id is the column in the database representing a UUID.
    public function behaviors()
    { 
        return [
            'uuidBehavior' => [
                'class' => \jberall\uuidbehavior\UuidBehavior::className(),
                'uuid_column' => '_id',
				],
			];
	}