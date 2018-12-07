<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use rmrevin\yii\module\Comments;
/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('home', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['/admin/tasks/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
         <?php if(yii::$app->user->can('deleteTask')):?>
        <?= Html::a('Delete', ['/admin/tasks/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'task_name',
            'info:ntext',
            'start_date',
            'end_date',
            'user.login',
            'taskMaker.login',
            'created_time',
            'updated_time'
        ],
    ]) ?>
    <?=  \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'=>'_galary',   
    ]); ?>
 
<?php $form = ActiveForm::begin() ?>
<?= $form->field($imgFile, 'image')->fileInput() ?>
<?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>

</div>
