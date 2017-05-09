<?php
/**
 * @author Yuriy Basov <basowy@gmail.com>
 * @since 1.0.0
 */


namespace yii2x\common\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PaceAsset extends AssetBundle
{
    public $publishOptions = [
      'forceCopy'=>true,
    ];
    public $sourcePath = '@vendor/yii2x/yii2-admin-lte/dist/';
    public $css = [
        'plugins/pace/style.css',
        ];
    public $js =  [
        'plugins/pace/script.js',  
    ];
    public $depends = [
    ];
}
