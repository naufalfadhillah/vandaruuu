<?php

namespace backend\controllers;

use common\models\Booking;
use common\models\Kamar;
use common\models\Pelanggan;
use Yii;
use common\models\Pembayaran;
use common\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembayaranController implements the CRUD actions for pembayaran model.
 */
class PembayaranController extends Controller
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
     * Lists all pembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembayaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status' => 'Belum']);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single pembayaran model.
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
        $model2 = Booking::findOne($model->pembayaran_id_booking);
        $model4 = Pelanggan::findOne($model2->booking_id_pelanggan);

        $uu=$model2->booking_id_kamar;
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
            'model4' => $model4,
        ]);
    }

    /**
     * Creates a new pembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembayaran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pembayaran_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing pembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pembayaran_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        $model->status = 'Sudah';
        $model->save();
        return $this->redirect(['index']);

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    public function actionDecline($id)
    {
        $model = $this->findModel($id);

        
        $model->status = 'Sudah';
        $model->save();
        return $this->redirect(['index']);
        

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Deletes an existing pembayaran model.
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
     * Finds the pembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembayaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
