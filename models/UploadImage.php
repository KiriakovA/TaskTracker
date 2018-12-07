<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\imagine\Image;
use yii\base\Model;

/**
 * Description of uploadImage
 *
 * @author shambay
 */
class UploadImage extends Model{
    public $image;
    public $smallPath;
    
    public function rules() {
        return [
            [['image'], 'file', 'extensions'=>['jpg']],
        ];
    }
    public function uploadIm(){
        $fileName=$this->image->baseName.".".$this->image->extension;
        $path='@uploads/'.$fileName;
        $this->image->saveAs(\Yii::getAlias($path));
       Image::thumbnail($path, 200, 200)
               ->save(\Yii::getAlias('@uploads/small/'. $fileName));
       $this->smallPath = $fileName;
        
    }

}
