<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Users;
/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(yii\jui\DatePicker::className(),[
        'language'=>'ru',
        'dateFormat'=>'yyyy-MM-dd'
    ])->textInput(['placeholder' => 'гггг-мм-дд']); ?>

    <?= $form->field($model, 'end_date')->widget(yii\jui\DatePicker::className(),[
        'language'=>'ru',
        'dateFormat'=>'yyyy-MM-dd',
        
    ])->textInput(['placeholder' => 'гггг-мм-дд']); ?>
    <?= $form->field($model, 'user_id')->dropDownList($usersList1) ?>

    <?= $form->field($model, 'task_maker')->dropDownList($usersList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
