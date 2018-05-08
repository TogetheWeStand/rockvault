<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Registry;
use app\models\Login;
use app\models\Search;

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
     * @return string
     */
    public function actionIndex()
    {
        $model = new Search();

        return $this->render('index', ['model' => $model]);
    }

    /**
     * @return string
     * @throws \Exception
     * @throws \yii\base\Exception
     */
    public function actionRegistry()
    {
        $model = new Registry();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->saveNewUser();

            $registry_success = true;
        } else {
            $registry_success = false;
        }

        return $this->render('index', ['registry' => $registry_success]);
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

        $model = new Login();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }

        $model->password = '';
        return $this->render('login', ['model' => $model]);
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

    public function actionSearch()
    {
        $model = new Search();

        $data = $model->searchTrack(Yii::$app->request->post("Search")['artist']);
        $data['albums']['test1'] = [];
        $data['albums']['Margin'] = [];
        $data['albums']['Father God'] = [];
        $data['albums']['Evel Death'] = [];
        $data['albums']['Testament'] = [];
        $data['albums']['True Sight'] = [];
        $data['albums']['Naval Boat'] = [];
        return $this->render('index', ['model' => $model, 'data' => $data]);
    }
}
