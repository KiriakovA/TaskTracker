<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Tasks;

/* @var $this yii\web\View */
/* @var $model app\models\filters\TasksFilter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'start_date')->label('Выбор месяца')->dropDownList(Tasks::getMonth(),array(
     'prompt' => '--Выберите месяц--' 
    ))
    ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
