<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\url;
?>
    
<?php if($model->url): ?>
<?= Html::a(Html::img(uploads.'/small/' .$model->url),"uploads/$model->url") ?> 
<?= Html::a('Удалить', ['dellimage', 'id' => $model->id_img], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
<?php endif; ?>



