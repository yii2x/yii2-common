<?php
/**
 * @author Yuriy Basov <basowy@gmail.com>
 * @since 1.0.0
 */

namespace yii2x\common\behaviors;

use Yii;
use yii\base\Behavior;


//use yii\db\ActiveRecord;
//use yii\web\NotFoundHttpException;
//use app\models\system\VirtualModel;
//use app\models\system\VirtualModelFieldValue;


class GuestViewOnlyBehavior extends Behavior
{
 
    public $attributes = [];
 
    public function events()
    {
        return [
            \yii\db\ActiveRecord::EVENT_BEFORE_VALIDATE => 'checkGuest',
            \yii\db\ActiveRecord::EVENT_BEFORE_DELETE => 'checkGuest',
            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'checkGuest',
            \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'checkGuest',            
        ];
    } 

    public function checkGuest($event){
        
        if(Yii::$app->user->isGuest == true){
            foreach($this->attributes as $attribute){
                $this->owner->addError($attribute, 'Guest has read only access.');
            }
            $event->isValid = false;
        }
    }        
}
