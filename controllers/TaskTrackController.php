<?php

namespace app\controllers;


use Yii;
use app\models\tables\Images;
use app\models\tables\Tasks;
use app\models\filters\TasksFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;



class TaskTrackController extends Controller {
    /**
     * {@inheritdoc}
     */
public function behaviors()
    {
        return [
            'access_user'=>[
                'class'=> \yii\filters\AccessControl::class,
                'only'=>['detail'],
                'rules'=>[
                    [
                        'actions'=>['detail'],
                        'allow'=>true,
                        'roles'=>['createTask']
                    ]
                ],
            ],
           
        ];
    }
    public function actionIndex() {
     $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDetail($id){
        $imgFile = new \app\models\UploadImage;
    if(\Yii::$app->request->isPost){
        $imgFile->load(\Yii::$app->request->post());
        $imgFile->image = UploadedFile::getInstance($imgFile, 'image');
        $imgFile->uploadIm();
        $url = new \app\models\tables\Images;
        $url->url=$imgFile->smallPath;
        $url->task_id=$id;
        $url->save();
        $this->redirect(['detail','id' => $id]);
    }
    $query = Images::find()->where(['task_id'=>$id]);
    $dataProvider = new ActiveDataProvider(['query' =>$query  ,'pagination' => ['pageSize' => 5,]]);     
    $comment=Users::find()->select(['login','id'])->where(['id'=>yii::$app->user->id]);
    return $this->render('detail', [
        'comment'=>$comment,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
            'imgFile'=> $imgFile
        ]);
  
    }
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findImage($id)
    {
        if (($model = Images::findOne(['id_img'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionPage($id){
           $dataProvider = new ActiveDataProvider([
               'query'=> Tasks::getUserPage($id)     
           ]);
       
           \Yii::$app->db->cache(function () use ($dataProvider) {
            return $dataProvider->prepare();
        },30);
           return $this->render('upage',[
               'dataProvider' => $dataProvider
           ]);
    }
    public function actionDellimage($id)
    {
        $fileName = $this->findImage($id)->url;
        $task = $this->findImage($id)->task_id;
        $this->findImage($id)->delete();
        unlink(Yii::getAlias('@uploads') . '/small/'. $fileName);
        unlink(Yii::getAlias('@uploads/') . $fileName);
        return $this->redirect(['detail', 'id'=>$task]);
       
        
    }
    public function actionComment($id){
        
    }
}
