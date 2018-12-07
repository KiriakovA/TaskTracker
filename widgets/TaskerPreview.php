<?php


namespace app\widgets;
use app\models\tables\Tasks;
use yii\base\Widget;

class TaskerPreview extends Widget
{
    /** @var  Task */
    public $model;

    public function run()
    {
        if (is_a($this->model, Tasks::class)) {
            return $this->render('view', ['model' => $this->model]);
        }
        throw new \Exception("Невозможно отобразить модель!");
    }
}
