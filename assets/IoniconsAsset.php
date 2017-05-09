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
class IoniconsAsset extends AssetBundle
{
    public $sourcePath = '@bower/';
    public $css = [
        'ionicons/css/ionicons.css'
        ];
    public $js =  [];
    public $depends = [];
}
