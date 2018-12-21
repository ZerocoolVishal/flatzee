<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * Register User action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        $request = Yii::$app->request->post();

        $model = new \app\models\Users();

        if ($model->load($request)) {

            $model->password = md5($request['Users']['password']);
            $model->accessToken = md5($request['Users']['username']);
            $model->authKey = md5($request['Users']['username']);

            if ($model->validate()) {
                $model->save();
                return $this->redirect(['site/user-created-success']);
            }
        }

        return $this->render('user_register', [
            'model' => $model,
        ]);
    }

    /**
     * User Register Success page
     *
     * @return string
     */
    public function actionUserCreatedSuccess()
    {
        return $this->render('success', [
            'title' => 'You Are Successifully Registered',
            'message' => 'Please Login',
            'redirect' => 'site/login'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Saving enquiries
     *
     * @return string
     */
    public function actionPropertyListing()
    {
        $model = new \app\models\Enquiries();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['site/enquiry-success']);
            }
        }

        return $this->render('enquiry', [
            'model' => $model,
        ]);
    }

    /**
     * Enquiry Success page
     *
     * @return string
     */
    public function actionEnquirySuccess()
    {
        return $this->render('success', [
            'title' => 'Property Listing Submit',
            'message' => 'Thank You, We will contact you soon.',
            'redirect' => 'site/'
        ]);
    }

    /**
     * User Profile
     *
     * @return string
     */
    public  function actionProfile()
    {

        $model = Users::find()->where(['id' => Yii::$app->user->identity->getId()])->one();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $model->save();
                return $this->render('profile', [
                    'model' => $model,
                    'message' => 'Profile Updated !!'
                ]);
            }
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }
}
