<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 28.03.2019
 * Time: 22:28
 */

namespace app\components;


use app\base\BaseComponent;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class FileServiceComponent extends BaseComponent
{
    public function saveUploadedFile(UploadedFile $file):string{
        $path=$this->genPathForFile($file);

        return $file->saveAs($path)?$path:'';
    }

    private function genPathForFile(UploadedFile $file):string {
        FileHelper::createDirectory(\Yii::getAlias('@webroot/images/'));
        return \Yii::getAlias('@webroot/images/').uniqid().'.'.$file->extension;
    }


}