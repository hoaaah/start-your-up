<?php

namespace backend\controllers;

use Yii;
use common\models\Company;
use backend\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Services;
use common\models\Portofolio;
use common\models\Team;
use common\models\Partner;

/**
 * HomepageController implements the CRUD actions for Company model.
 */
class HomepageController extends Controller
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

    public function actionIndex(){
        $homepage = new \common\models\Homepage();
        $model = $this->findModel(1);

        // create data for $homepage 
        $services = \yii\helpers\ArrayHelper::map(Services::find()->all(),'id','title');
        $value = Services::find()->where(['homepage' => 1])->all();
        $selected = NULL;
        foreach($value as $v){
            $selected[] = $v->id;
        }
        $homepage->services = $selected;

        $portofolio = \yii\helpers\ArrayHelper::map(Portofolio::find()->all(),'id','title');
        $value = Portofolio::find()->where(['published' => 1])->all();
        $selected = NULL;
        foreach($value as $v){
            $selected[] = $v->id;
        }
        $homepage->portofolio = $selected; 

        $team = \yii\helpers\ArrayHelper::map(Team::find()->all(),'id','name');
        $value = Team::find()->where(['homepage' => 1])->all();
        $selected = NULL;
        foreach($value as $v){
            $selected[] = $v->id;
        }
        $homepage->team = $selected;

        $partner = \yii\helpers\ArrayHelper::map(Partner::find()->all(),'id','name');
        $value = Partner::find()->where(['homepage' => 1])->all();
        $selected = NULL;
        foreach($value as $v){
            $selected[] = $v->id;
        }
        $homepage->partner = $selected;        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-success', 'Saved record successfully');
            return $this->redirect(['index']);
        }  
        if ($homepage->load(Yii::$app->request->post())) {
            
            IF($homepage->services <> NULL){
                IF(($key = array_search('multiselect-all', $homepage->services)) !== false) {
                    unset($homepage->services[$key]);
                }                
                IF(count($homepage->services) <= $model->service_homepage){
                    $updateServices = implode(',', $homepage->services);
                    Services::updateAll(['homepage' => 1], "id IN ($updateServices)");
                    Services::updateAll(['homepage' => 0], "id NOT IN ($updateServices)");
                }ELSE{
                    Yii::$app->getSession()->setFlash('danger',  'Exceeded Allowed Service in Homepage');        
                }
            }ELSE{
                Services::updateAll(['homepage' => 0]);
            }

            IF($homepage->portofolio <> NULL){
                IF(($key = array_search('multiselect-all', $homepage->portofolio)) !== false) {
                    unset($homepage->portofolio[$key]);
                } 
                IF(count($homepage->portofolio) <= $model->portofolio_homepage){
                    $updatePortofolio = implode(',', $homepage->portofolio);
                    Portofolio::updateAll(['published' => 1], "id IN ($updatePortofolio)");
                    Portofolio::updateAll(['published' => 0], "id NOT IN ($updatePortofolio)");
                }ELSE{
                    Yii::$app->getSession()->setFlash('danger',  'Exceeded Allowed Portofolio in Homepage');        
                }
            }ELSE{
                Portofolio::updateAll(['published' => 0]);
            }

            IF($homepage->team <> NULL){
                IF(($key = array_search('multiselect-all', $homepage->team)) !== false) {
                    unset($homepage->team[$key]);
                } 
                $updateTeam = implode(',', $homepage->team);
                Team::updateAll(['homepage' => 1], "id IN ($updateTeam)");
                Team::updateAll(['homepage' => 0], "id NOT IN ($updateTeam)");
            }ELSE{
                Team::updateAll(['homepage' => 0]);
            }

            IF($homepage->partner <> NULL){
                IF(($key = array_search('multiselect-all', $homepage->partner)) !== false) {
                    unset($homepage->partner[$key]);
                } 
                $updatePartner = implode(',', $homepage->partner);
                Partner::updateAll(['homepage' => 1], "id IN ($updatePartner)");
                Partner::updateAll(['homepage' => 0], "id NOT IN ($updatePartner)");
            }ELSE{
                Partner::updateAll(['homepage' => 0]);
            }

            return $this->redirect(['index']);
        }       

        return $this->render('index',[
            'model' => $model,
            'homepage' => $homepage,
            'services' => $services,
            'portofolio' => $portofolio,
            'team' => $team,
            'partner' => $partner,
        ]);
    }

    public function actionIndexold()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    { 
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();

        if ($model->load(Yii::$app->request->post())) {
            IF($model->save()){
                echo 1;
            }ELSE{
                echo 0;
            }
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            IF($model->save()){
                echo 1;
            }ELSE{
                echo 0;
            }
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
