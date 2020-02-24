<?php
namespace frontend\controllers;

use common\models\Kamar;
use common\models\Pelanggan;
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

/**
 * Site controller
 */
class KamarController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        $query = Kamar::find()->select("*")->leftJoin('tipe','kamar_tipe = tipe_id');
        $kamar = $query->indexBy('kamar_id')->all();
        return $this->render('index',['kamar'=>$kamar]);
    }
    public function actionPesan($id){
        $model = new Pelanggan();
        $query = Kamar::find()->select("*")->leftJoin('foto_kamar','foto_id_kamar = kamar_id');
        $kamar = $query->indexBy('kamar_id')->all();
        return $this->render('pesan',['kamar'=>$kamar,"model"=>$model]);
    }
    public function actionDetail($id){
        $query = Kamar::find()->select("*")->leftJoin('tipe','kamar_tipe = tipe_id');
        $kamar = $query->indexBy('kamar_id')->all();
        return $this->render('kamar_detail',['kamar'=>$kamar]);
    }

}
