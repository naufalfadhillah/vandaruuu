<?php

namespace backend\controllers;

use Yii;
use common\models\FotoGaleri;
use common\models\FotoGaleriSearch;
use common\models\Galeri;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FotoGaleriController implements the CRUD actions for FotoGaleri model.
 */
class FotoGaleriController extends Controller
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
     * Lists all FotoGaleri models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FotoGaleriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FotoGaleri model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$galeri)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'galeri' => $this->findModelGaleri($galeri),
        ]);
    }

    /**
     * Creates a new FotoGaleri model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($galeri)
    {
        $galeri = $this->findModelGaleri($galeri);

        $model = new FotoGaleri();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }
        if ($model->load(Yii::$app->request->post())) {
            $model->id_galeri = $galeri->galeri_id;
            if ($model->validate()) {
                $names = UploadedFile::getInstances($model, 'filesaver');
                $galeri = $model->id_galeri;
                $creator_name = Yii::$app->user->identity->username;
                $creator_date = date("Y-m-d");
                $status = $model->status;
                foreach ($names as $name) {
                    $timestamp = time();
                    $path = Yii::$app->basePath . '/web/foto_galeri/' .$name->baseName.'_'.$timestamp.'.'.$name->extension;
                    if ($name->saveAs($path)) {
                        $nama_foto = $name->baseName.'_'.$timestamp.'.'.$name->extension;
                        $file = '/foto_galeri/'.$name->baseName.'_'.$timestamp.'.'.$name->extension;
                        Yii::$app->db->createCommand()->insert('foto_galeri', ['id_galeri' => $galeri, 'nama_foto' => $nama_foto, 'created_by' => $creator_name, 'created_date' => $creator_date, 'file' => $file, 'status' => $status])->execute();
                    }
                }
            }
            Yii::$app->session->setFlash('success', 'Data berhasil ditambah.');
            return $this->redirect(['galeri/view', 'id' => $model->id_galeri]);
        }

        return $this->render('create', [
            'model' => $model,
            'galeri' => $galeri,
        ]);
    }

    /**
     * Updates an existing FotoGaleri model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $galeri)
    {
        $model = $this->findModel($id);

        $data = $model;

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }
        if ($model->load(Yii::$app->request->post())) {
            
            // Conditional
            if (UploadedFile::getInstance($model, 'filesaver2') != null) {
                
                // Delete Last File
                if (file_exists($data->file)) { // Check if The File Exist
                    unlink($data->file); // Delete The File
                }
                
                // Photo Upload
                $imageName = $model->nama_foto; 
                $model->filesaver = UploadedFile::getInstance($model, 'filesaver2');
                $timestamp = time();
                $model->file = '/web/foto_galeri/'.$imageName.'_'.$timestamp.'.'.$model->filesaver->extension;
                $model->filesaver->saveAs( Yii::$app->basePath. '/web/foto_galeri/'.$imageName.'_'.$timestamp.'.'.$model->filesaver->extension, false );
            }

            // Creator
            Yii::$app->creator->update($model);

            // Model Save
            $model->save(false);

            return $this->redirect(['galeri/view', 'id' => $galeri]);
        }

        return $this->render('update', [
            'model' => $model,
            'galeri' => $this->findModelGaleri($galeri),
        ]);
    }

    /**
     * Deletes an existing FotoGaleri model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$galeri)
    {
        $data = $this->findModel($id);
        if (file_exists($data->file)) { // Check if The File Exist
            unlink($data->file); // Delete The File
        }
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Data berhasil dihapus.');
        return $this->redirect(['galeri/view', 'id' => $galeri]);
    }

    /**
     * Finds the FotoGaleri model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FotoGaleri the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FotoGaleri::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelGaleri($id)
    {
        if (($modelgaleri = Galeri::findOne($id)) !== null) {
            return $modelgaleri;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findLastModel()
    {
        if (($lastId = FotoGaleri::find()->orderBy(['id' => SORT_DESC])->one()) !== null) {
            return $lastId;
        } else {
            $lastId = new FotoGaleri;
            $lastId->id = 0;
            return $lastId;
        }
    }
}
