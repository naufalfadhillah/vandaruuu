<?php

namespace backend\controllers;

use Yii;
use common\models\Booking;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Pelanggan;
use common\models\PelangganSearch;
use common\models\Kamar;
use common\models\KamarSearch;
use yii\web\UploadedFile;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['booking_status' => 'Menunggu Pembayaran']);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id)
    {
        $model = $this->findModel($id);
        // $searchModel = new PelangganSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider->query->andWhere(['pelanggan_id' => $model->booking_id_pelanggan]);
        $model2 = Pelanggan::findOne($model->booking_id_pelanggan);
        $uu=$model->booking_id_kamar;
        $ccd=explode(",",$uu);
        $n = count($ccd);
        // $i = 0;
        $model3 = array();

        for ($i= 0; $i < $n ; $i++) {
            $model3 [$i]= array(Kamar::findOne($ccd[$i]));
        }
        // print_r($model3);
        // exit();
        // print_r($model2);
        // exit();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model2' => $model2,
            'model3' => $model3,
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->booking_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->booking_status = 'Sudah dibayar';
            $model->save();
            if ($model->validate()) {
                if (UploadedFile::getInstances($model, 'filesaver') != null) {
                    $names = UploadedFile::getInstances($model, 'filesaver');
                    $idbooking = $model->booking_id;
                    $jumlah = $model->booking_harga;
                    $tgl = date("Y-m-d");
                    $idP = $model->booking_id_pelanggan;
                    $status = 'Sudah';
                    foreach ($names as $name) {
                        $timestamp = time();
                        $path = Yii::$app->basePath . '/web/foto_resi/' .'IMG_vandaruresi'.$idP.$tgl.$timestamp.'_'.$idbooking.'.'.$name->extension;
                        if ($name->saveAs($path)) {
                            $nama_foto = 'IMG_vandaruresi'.$idP.$tgl.$timestamp.'_'.$idbooking.'.'.$name->extension;
                            $file = '/foto_resi/' .'IMG_vandaruresi'.$idP.$tgl.$timestamp.'_'.$idbooking.'.'.$name->extension;
                            Yii::$app->db->createCommand()->insert('pembayran', ['pembayaran_id_booking' => $idbooking, 'pembayaran_jumlah' => $jumlah, 'pembayaran_tgl_bayar' => $tgl, 'pembayaran_resi' => $file, 'status' => $status])->execute();
                        }
                    }
                }
            }else{
                return $model->getErrors();
            }
            
            Yii::$app->session->setFlash('success', 'Upload Bukti Pembayaran sukses.');
            return $this->redirect(['index']);

        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
