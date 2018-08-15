<?php

namespace app\controllers;

use app\models\NewPostForm;
use app\models\Post;
use app\models\RegisterForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class PostController extends Controller
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
        return $this->actionPost();
    }

    public function actionPost($id) {
        if (!isset($id)) {
            return $this->goHome();
        }

        $post = Post::findOne($id);
        if (!$post) {
            return $this->goHome();
        }

        // After visit a post, add +1 viewer
        $post->viewed = $post->viewed + 1;
        $post->save();

        return $this->render('index',[
            'post' => $post,
        ]);
    }

    public function actionNewpost() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new NewPostForm();
        if ($model->load(Yii::$app->request->post()) && $model->newPost()) {
            return $this->goBack();
        }

        return $this->render('newpost',[
            'model' => $model,
        ]);
    }

}
