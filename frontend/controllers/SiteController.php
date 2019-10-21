<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
    public function actionIndex($lang = null)
    {
        $lang = empty($lang) ? $this->get_lang() : $lang;

        if ($lang == 'en') {
          return $this->render('index-en');
        }

        return $this->render('index');
    }


  	function get_lang() {
  		if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
  			$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
     			 $lang = substr($lang,0,5);
      		if(preg_match("/zh-cn/i",$lang)){
       			$lang = "zh-cn";
      		}elseif(preg_match("/zh/i",$lang)){
       			$lang = "zh-cn";
      		}else{
         		 	$lang = "en";
      		}
      		return $lang;
     		}else{
          $lang = "en";
     			return $lang;
     		}
    }

}
