<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class UploadAsset extends AssetBundle
{
    public $sourcePath = '@common/web';
    public $baseUrl    = '@web';

    public $publishOptions = [
        'forceCopy'=>true,
    ];        
}
