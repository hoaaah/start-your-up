<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Html;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = \common\models\Company::findOne(1);
        $services = \common\models\Services::findAll(['homepage' => 1]);
        $portofolio = \common\models\Portofolio::findAll(['published' => 1]);
        $team = \common\models\Team::findAll(['homepage' => 1]);
        $maps = \common\models\Location::find()->all();

        $this->layout = 'main_agency';

        return $this->render('index', [
            'model' => $model,
            'services' => $services,
            'portofolio' => $portofolio,
            'team' => $team,
            'maps' => $maps,
        ]);
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

    public function actionApply($id)
    {
        $portofolio = \common\models\Portofolio::findOne(['id' => $id]);
        $model = new \common\models\QuotationRequest();
        $model->product_request = $id;
        $model->date_of_request = date('Y-m-d');
        $model->partner_category = 'Client-Frontend';

        // Yii::$app->mailqueue->compose('quotation/request', ['model' => $model, 'portofolio' => $portofolio])
        // ->setFrom('from@domain.com')
        // ->setTo($model->customer_email)
        // ->setBcc ('admin@admin.com')
        // ->setSubject('Quotation Request for '.$portofolio->title)
        // ->send();

        $getMeBack = \yii\helpers\Url::to(['apply', 'id' => $id]);
        
        if ($model->load(Yii::$app->request->post())) {
            IF($model->save()){
                $message = "Request Success, we will answer you request immediately via email or phone.";
                $status = 1;
                return $this->render('apply_result', [
                    'message' => $message,
                    'portofolio' => $portofolio,
                    'getMeBack' => $getMeBack,
                    'status' => $status
                ]);
            }ELSE{
                $message = "Request failed. Click this button to retry. ".Html::a('Click to retry', $getMeBack, ['class' => 'btn btn-xs btn-danger']);
                $status = 0;
                return $this->render('apply_result', [
                    'message' => $message,
                    'portofolio' => $portofolio,
                    'getMeBack' => $getMeBack,
                    'status' => $status
                ]);
            }
        } else {
            return $this->render('apply', [
                'model' => $model,
                'portofolio' => $portofolio,
            ]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
