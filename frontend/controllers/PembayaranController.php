<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 26/02/20
 * Time: 20:40
 */

namespace frontend\controllers;
use common\models\Booking;
use common\models\Kamar;
use common\models\Pelanggan;
use common\models\Pembayaran;
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
use yii\web\UploadedFile;

class PembayaranController extends Controller
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
        $pembayaran = new Pembayaran();
        $booking = new Booking();

        if ($booking->load(Yii::$app->request->post())) {
            $pesan = Booking::findOne(Yii::$app->request->post()['Booking']['booking_id']);
            $pelanggan = Pelanggan::findOne($pesan['booking_id_pelanggan']);
            $kamar = explode(",",$pesan['booking_id_kamar']);
            if ($pesan){
                Yii::$app->session->setFlash('success', "Nomor Pemesanan Berhasil di temukan");
            }
            else{
                Yii::$app->session->setFlash('warning', "Nomor Pemesanan Tidak di temukan");
            }
            return $this->render('index',['pembayaran'=>$pembayaran,'booking'=>$booking,'pelanggan'=>$pelanggan,'pesan'=>$pesan,'kamar'=>$kamar]);
        }
        else{
            return $this->render('index',['booking'=>$booking]);
        }
    }
    public function actionBayar(){
        $pembayaran = new Pembayaran();

        $booking = new Booking();

        if ($pembayaran->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($pembayaran,'pembayaran_resi');
            $pemesanan = Booking::findOne($pembayaran['pembayaran_id_booking']);
            $pelanggan = Pelanggan::findOne($pemesanan['booking_id_pelanggan']);
            $kamar = explode(",",$pemesanan['booking_id_kamar']);
            $pembayaran->status = "sudah";
            if($pembayaran->validate()){
                $pembayaran->save();
                if (!empty($gambar)) {
                    $gambar->saveAs(Yii::getAlias('@frontend/web/img/') . 'resi.' . $gambar->extension);
                    $pembayaran->pembayaran_resi = 'gambar.' . $gambar->extension;
                    $pembayaran->save(FALSE);
                }
            }
                    $pembayaran->save();
            Yii::$app->session->setFlash('success', "Pembayaran Berhasil");
            return $this->render('index',['pembayaran'=>$pembayaran,'booking'=>$booking,'pelanggan'=>$pelanggan,'pesan'=>$pemesanan,'kamar'=>$kamar]);
        }
        else{
            Yii::$app->session->setFlash('warning', "Pembayaran Belum Berhasil");
            return $this->render('index',['booking'=>$booking]);
        }
    }
}