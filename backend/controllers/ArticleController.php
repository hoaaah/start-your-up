<?php

namespace backend\controllers;

use Yii;
use common\models\Articles;
use backend\models\ArticlesSearch;
use common\models\Tags;
use common\models\ArticleTags;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Articles model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();
        $tags = new Tags();
        $articleTags = new ArticleTags();
        $availableTags = \yii\helpers\ArrayHelper::map(Tags::find()->all(),'title','title'); 

        if ($model->load(Yii::$app->request->post()) && $tags->load(Yii::$app->request->post()) ){
            IF($model->save()){
                // after article saved, we save tags
                $preInsertTag = NULL;
                if($tags->input_tags){
                    foreach($tags->input_tags as $input ){
                        $checkTag = Tags::findOne(['path' => strtolower($input)]);
                        IF(!$checkTag){
                            $tags = new Tags();
                            $tags->title = $input;
                            $tags->path = strtolower($input);
                            $tags->save();
                            $preInsertTag[] = $tags->id;
                        }ELSE{
                            $preInsertTag[] = $checkTag->id;
                        }
                    }
                    // after all tags saved, we create articles tags
                    foreach($preInsertTag AS $tag_id){
                        $articleTags = new ArticleTags();
                        $articleTags->article_id = $model->id;
                        $articleTags->tag_id = $tag_id;
                        $articleTags->save();
                    }                    
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'tags' => $tags,
                'articleTags' => $articleTags,
                'availableTags' => $availableTags,
            ]);
        }
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
