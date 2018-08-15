<?php

namespace app\controllers;

use app\models\NewPostForm;
use app\models\Post;
use app\models\RegisterForm;
use app\models\SettingsModel;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller
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
        return $this->goHome();
    }

    public function actionUser($id) {
        if (!isset($id)) {
            return $this->goHome();
        }

        $user = User::findOne($id);
        if (!$user) {
            return $this->goHome();
        }

        return $this->render('user',[
            'user' => $user,
        ]);
    }

    public function actionSettings() {
        if (Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }
        $model = new SettingsModel();
        if ($model->load(Yii::$app->request->post()) && $model->change()) {
            return $this->goBack();
        }

        return $this->render("settings", [
            'model' => $model,
            'user' => Yii::$app->getUser()->identity,
        ]);
    }


}
