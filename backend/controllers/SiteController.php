<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'image'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImage($cat, $id)
    {
        $response = Yii::$app->getResponse();

        // 1 => portofolio
        switch ($cat) {
            case 1:
                $portofolio = \common\models\Portofolio::findOne(['id' => $id]);        
                return $response->sendFile(Yii::$app->params['uploadPath'] . 'portofolio/' . $portofolio->image, $portofolio->image, [
                        // 'mimeType' => $model->type,
                        // 'fileSize' => $model->size,
                        'inline' => true
                ]);
                break;
            case 2:
                $team = \common\models\Team::findOne(['id' => $id]);        
                return $response->sendFile(Yii::$app->params['uploadPath'] . 'avatar/' . $team->avatar, $team->avatar, [
                        // 'mimeType' => $model->type,
                        // 'fileSize' => $model->size,
                        'inline' => true
                ]);
                break;            
            
            default:
                # code...
                break;
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
