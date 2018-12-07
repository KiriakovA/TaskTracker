<?php

namespace app\models\filters;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Tasks;

/**
 * TasksFilter represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TasksFilter extends Tasks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'task_maker'], 'integer'],
            [['user_id','task_name', 'info', 'start_date', 'end_date','created_time','updated_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tasks::find();
               

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            
            
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
            'task_maker' => $this->task_maker,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
              ->andFilterWhere(['like', 'info', $this->info])
               ->andFilterWhere(['in', 'MONTH(start_date)', $this->start_date]) ;
                

        return $dataProvider;
    }
}
