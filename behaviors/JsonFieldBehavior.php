<?php
/**
 * @author Yuriy Basov <basowy@gmail.com>
 * @since 1.0.0
 */

namespace yii2x\common\behaviors;

use yii\base\Behavior;


//use yii\db\ActiveRecord;
//use yii\web\NotFoundHttpException;
//use app\models\system\VirtualModel;
//use app\models\system\VirtualModelFieldValue;


class JsonFieldBehavior extends Behavior
{
 
    public $attributes = [];
 
    public function events()
    {
        return [
            \yii\db\ActiveRecord::EVENT_AFTER_FIND => 'decodeJson',
            \yii\db\ActiveRecord::EVENT_AFTER_INSERT => 'decodeJson',
            \yii\db\ActiveRecord::EVENT_AFTER_UPDATE => 'decodeJson',
            \yii\db\ActiveRecord::EVENT_BEFORE_VALIDATE => 'encodeJson',
        ];
    } 

    public function decodeJson($event){
        
        foreach($this->attributes as $attribute){
            $value = $this->owner->$attribute;
            if(!empty($value) && json_decode($value)){
                try{
                    $value = \yii\helpers\Json::decode($value); 
                    $this->owner->$attribute = $value;
                } catch (Exception $ex) {
                    $this->owner->$attribute = [];
                }
            }
            else{
                $this->owner->$attribute = [];
            }    
        }
    }    
    
    public function encodeJson($event){
  
        foreach($this->attributes as $index => $attribute){

            $value = $this->owner->$attribute;
            if(!empty($value) && is_array($value)){               
                $this->owner->$attribute = \yii\helpers\Json::encode($value);
            } 
        }
    }        
}
