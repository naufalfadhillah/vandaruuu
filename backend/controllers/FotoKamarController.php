<?php

namespace backend\controllers;

use Yii;
use common\models\FotoKamar;
use common\models\FotoKamarSearch;
use common\models\Tipe;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FotoKamarController implements the CRUD actions for FotoKamar model.
 */
class FotoKamarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FotoKamar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FotoKamarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FotoKamar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$tipe)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'tipe' => $this->findModelTipe($tipe),
        ]);
    }

    /**
     * Creates a new FotoKamar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tipe)
    {
        $tipe = $this->findModelTipe($tipe);
        $model = new FotoKamar();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->foto_id_foto]);
        // }
        if ($model->load(Yii::$app->request->post())) {
            $model->foto_id_tipe = $tipe->tipe_id;
            if ($model->validate()) {
                $names = UploadedFile::getInstances($model, 'filesaver');
                $tipe = $model->foto_id_tipe;
                $creator_name = Yii::$app->user->identity->username;
                $creator_date = date("Y-m-d");
                $status = $model->status;
                foreach ($names as $name) {
                    $timestamp = time();
                    $path = Yii::$app->basePath . '/web/foto_kamar/' .'IMG_vandaru'.$tipe.$timestamp.'.'.$name->extension;
                    if ($name->saveAs($path)) {
                        $nama_foto = 'IMG_vandaru'.$tipe.$timestamp.'.'.$name->extension;
                        $file = '/foto_kamar/' .'IMG_vandaru'.$tipe.$timestamp.'.'.$name->extension;
                        Yii::$app->db->createCommand()->insert('foto_kamar', ['foto_id_tipe' => $tipe, 'foto_kamar' => $nama_foto, 'created_by' => $creator_name, 'created_date' => $creator_date, 'file' => $file, 'status' => $status])->execute();
                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Data berhasil ditambah.');
            return $this->redirect(['tipe/view', 'id' => $model->foto_id_tipe]);
        }
        return $this->render('create', [
            'model' => $model,
            'tipe' => $tipe,
        ]);
    }

    /**
     * Updates an existing FotoKamar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$tipe)
    {
        $model = $this->findModel($id);
        $data = $model;
        $model->foto_id_tipe = $tipe;

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->foto_id_foto]);
        // }
        if ($model->load(Yii::$app->request->post())) {
            
            // Conditional
            if (UploadedFile::getInstance($model, 'filesaver2') != null) {
                
                // Delete Last File
                if (file_exists($data->file)) { // Check if The File Exist
                    unlink($data->file); // Delete The File
                }
                
                // Photo Upload
                // $imageName = $model->foto_kamar; 
                $model->filesaver = UploadedFile::getInstance($model, 'filesaver2');
                $timestamp = time();
                $model->file = '/foto_kamar/'.'IMG_vandaru'.$tipe.$timestamp.'.'.$model->filesaver->extension;
                $model->filesaver->saveAs( Yii::$app->basePath.'/web/foto_kamar/'.'IMG_vandaru'.$tipe.$timestamp.'.'.$model->filesaver->extension, false );
            }

            // Creator
            Yii::$app->creator->update($model);

            // Model Save
            $model->save(false);

            return $this->redirect(['tipe/view', 'id' => $tipe]);
        }

        return $this->render('update', [
            'model' => $model,
            'tipe' => $this->findModelTipe($tipe),
        ]);
    }

    /**
     * Deletes an existing FotoKamar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$tipe)
    {
        $data = $this->findModel($id);
        if (file_exists($data->file)) { // Check if The File Exist
            unlink($data->file); // Delete The File
        }
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Data berhasil dihapus.');
        return $this->redirect(['tipe/view', 'id' => $tipe]);
    }

    /**
     * Finds the FotoKamar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FotoKamar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FotoKamar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelTipe($id)
    {
        if (($modelTipe = Tipe::findOne($id)) !== null) {
            return $modelTipe;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findLastModel()
    {
        if (($lastId = FotoKamar::find()->orderBy(['foto_id_foto' => SORT_DESC])->one()) !== null) {
            return $lastId;
        } else {
            $lastId = new FotoKamar;
            $lastId->id = 0;
            return $lastId;
        }
    }
}
