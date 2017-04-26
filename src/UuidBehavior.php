<?php


namespace jberall\uuidbehavior;

use yii\base\InvalidCallException;
use yii\db\BaseActiveRecord;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
/**
 * UuidBehavior automatically fills the specified attributes with the current V4 UUID returned from the Ramsey\Uuid.
 *

 * @author Jonathan Berall <jberall@gmail.com>
 */
class UuidBehavior extends \yii\behaviors\AttributeBehavior
{
    /**
     * @var string the attribute that will receive timestamp value
     * Set this property to false if you do not want to record the creation time.
     */
    public $uuid_column = '_id';
 
    /**
     * @inheritdoc
     *
     * In case, when the value is `null`, the result of the PHP function [time()](http://php.net/manual/en/function.time.php)
     * will be used as value.
     */
    public $value;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->uuid_column],
//                BaseActiveRecord::EVENT_BEFORE_UPDATE => [$this->uuid_column],
            ];
        }
    }

    /**
     * @inheritdoc
     *
     * In case, when the [[value]] is `null`, the result of the PHP function [time()](http://php.net/manual/en/function.time.php)
     * will be used as value.
     */
    protected function getValue($event)
    {
        
        return Uuid::uuid4()->toString();
//        if ($this->value === null) {
//            return time();
//        }
//        return parent::getValue($event);
    }


}
