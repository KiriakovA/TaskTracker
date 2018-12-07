<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
      <?= Html::a('Admin Users', ['/admin-user/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'task_name',
            'info:ntext',
            'start_date',
            'end_date',
            'user_id',
            'task_maker',
            [
                'attribute' => 'user_id',
                'label' => 'Исполнитель',
                'format' => 'text', // Возможные варианты: raw, html
                'content' => function($data) {
                    return $data->getUserName();
                },
            ],
                    
            'created_time',
            'updated_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
