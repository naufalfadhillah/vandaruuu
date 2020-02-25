<?php
namespace frontend\controllers;

use common\models\Booking;
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
        $query = Kamar::find();
        $kamar = $query->indexBy('kamar_id')->all();
        return $this->render('index',['kamar'=>$kamar]);
    }
    public function actionPesan()
    {
        $pelanggan = new Pelanggan();
        $pemesanan = new Booking();

        if ($pelanggan->load(Yii::$app->request->post())) {
//            var_dump(Yii::$app->request->post()['Booking']);die;
            $pelanggan->save();
            $booking = array(
                "booking_id_pelanggan"=>15,
                "booking_id_kamar"=>Yii::$app->request->post()['Booking']('booking_id_kamar'),
                "booking_durasi"=>Yii::$app->request->post()['Booking']('booking_durasi'),
                "booking_tgl_pesan"=>Yii::$app->request->post()['Booking']('booking_tgl_pesan'),
                "booking_tgl_pesan"=>Yii::$app->request->post()['Booking']('booking_tgl_check_in'),
                "booking_tgl_pesan"=>"Menunggu Pembayaran",
                "booking_harga"=>10000,
            );
            $pemesanan->load($booking);
            $pemesanan->save();

//            var_dump(Yii::$app->request->post()['Pelanggan']['pelanggan_nama']);die;

            echo ''.Yii::$app->request->post("pelanggan_nama");
           /*
            Yii::$app->session->setFlash('success', "Your message to display.");
            return $this->redirect(['pesan']);
        */
           }
        else{
            return $this->render('pesan', [
                'model' => $pelanggan,
                'pemesanan'=>$pemesanan,
            ]);
        }

    }


}
