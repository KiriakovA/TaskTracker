<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
   
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Create Task', ['/create-task'], ['class' => 'btn btn-success']) ?>
       
    <?=  \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' =>function($model){
            return \app\widgets\TaskerPreview::widget(['model'=>$model]);
        },
        'summary'=>false,
        'options'=>[
            
        ],
        'viewParams'=>[
            'hideBreadcrumbs'=>true
            
        ],
      
    ]); ?>
</div>
