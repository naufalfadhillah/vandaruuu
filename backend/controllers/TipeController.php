<?php

namespace backend\controllers;

use common\models\Fasilitas;
use Yii;
use common\models\Tipe;
use common\models\TipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\FotoKamar;
use common\models\FotoKamarSearch;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * TipeController implements the CRUD actions for Tipe model.
 */
class TipeController extends Controller
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
     * Lists all Tipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tipe model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new FotoKamarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['foto_id_tipe' => $id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Tipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $query = Fasilitas::find();
        $modelf = $query->all();
        $model = new Tipe();
        $post = Yii::$app->request->post();
        
        if ($model->load(Yii::$app->request->post())) {
            // $model->created_by = Yii::$app->user->identity->username;
		    // $model->created_date = date("Y-m-d");

           $model->tipe_fasilitas = implode(',',$post['Tipe']['tipe_fasilitas']); 
           $model->save();
            if ($model->validate()) {
                if (UploadedFile::getInstances($model, 'filesaver') != null) {
                    $names = UploadedFile::getInstances($model, 'filesaver');
                    $tipe = $model->tipe_id;
                    $creator_name = Yii::$app->user->identity->username;
                    $creator_date = date("Y-m-d");
                    $status = 'Aktif';
                    $n = 0;
                    foreach ($names as $name) {
                        $timestamp = time();
                        $path = Yii::$app->basePath . '/web/foto_kamar/' .'IMG_vandaru'.$tipe.$timestamp.$n.'.'.$name->extension;
                        if ($name->saveAs($path)) {
                            $nama_foto = 'IMG_vandaru'.$tipe.$timestamp.$n.'.'.$name->extension;
                            $file = '/foto_kamar/' .'IMG_vandaru'.$tipe.$timestamp.$n.'.'.$name->extension;
                            Yii::$app->db->createCommand()->insert('foto_kamar', ['foto_id_tipe' => $tipe, 'foto_kamar' => $nama_foto, 'created_by' => $creator_name, 'created_date' => $creator_date, 'file' => $file, 'status' => $status])->execute();
                            if($n == 0){
                                $model->tipe_gambar = '/foto_kamar/' .'IMG_vandaru'.$tipe.$timestamp.$n.'.'.$name->extension;
                                $model->save();
                            }
                        }
                        $n++;
                    }
                }
            }else{
                return $model->getErrors();
            }
            
            Yii::$app->session->setFlash('success', 'Data berhasil ditambah.');
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
            'modelf' => $modelf,
        ]);
    }

    /**
     * Updates an existing Tipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil diubah.');
            return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->tipe_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('warning', 'Data berhasil dihapus.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tipe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
