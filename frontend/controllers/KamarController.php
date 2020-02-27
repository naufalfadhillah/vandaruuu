<?php

namespace frontend\controllers;

use common\models\Booking;
use common\models\Kamar;
use common\models\Pelanggan;
use common\models\Tipe;
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
use yii\helpers\ArrayHelper;

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
        return $this->render('index', ['kamar' => $kamar]);
    }

    public function actionPesan()
    {
        $pelanggan = new Pelanggan();
        $pemesanan = new Booking();
        $harga = 0;


        if ($pelanggan->load(Yii::$app->request->post())) {
            // var_dump(Yii::$app->request->post()['Booking']['booking_durasi']);die;
            //$pelanggan->pelanggan_id=26;
            $pelanggan->save();
            if ($pemesanan->load(Yii::$app->request->post())) {
                $kamar = "";
                foreach (Yii::$app->request->post()['Booking']['booking_id_kamar'] as $k) {
                    $kamar_data = Kamar::findOne($k);
                    $tipe = Tipe::findOne($kamar_data['kamar_tipe']);
                    if ($kamar === "") {
                        $kamar .= $k;
                    } else {
                        $kamar .= "," . $k;
                    }
                    $harga = $harga + $tipe['tipe_harga'];
                }
                $pemesanan->booking_id_kamar = $kamar;
                $pemesanan->booking_id_pelanggan = $pelanggan->pelanggan_id;
                $pemesanan->booking_harga = $harga*$pemesanan->booking_durasi;
                $pemesanan->booking_status = "Menunggu pembayaran";
                $pemesanan->save();
            }
            Yii::$app->session->setFlash('success', "Nomor Pemesanan anda adalah " . $pemesanan->booking_id . " Simpan Nomor Ini Untuk Melakukan pembayaran");
            return $this->render('pesan', [
                'model' => $pelanggan,
                'pemesanan' => $pemesanan,

            ]);
        } else {
            return $this->render('pesan', [
                'model' => $pelanggan,
                'pemesanan' => $pemesanan,

            ]);
        }
    }
    public function actionBayar(){

    }


}
