<?php

namespace backend\controllers;

use Yii;
use common\models\Galeri;
use common\models\GaleriSearch;
use common\models\FotoGaleri;
use common\models\FotoGaleriSearch;
use Exception;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GaleriController implements the CRUD actions for Galeri model.
 */
class GaleriController extends Controller
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
     * Lists all Galeri models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GaleriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Galeri model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new FotoGaleriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id_galeri' => $id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Galeri model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Galeri();

        
        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->username;
		    $model->created_date = date("Y-m-d");

            $model->save();

            
            if ($model->validate()) {
                if (UploadedFile::getInstances($model, 'filesaver') != null) {
                    $names = UploadedFile::getInstances($model, 'filesaver');
                    $galeri = $model->galeri_id;
                    $creator_name = Yii::$app->user->identity->username;
                    $creator_date = date("Y-m-d");
                    $status = $model->status;
                    foreach ($names as $name) {
                        $timestamp = time();
                        $path = Yii::$app->basePath . '/web/foto_galeri/' .$name->baseName.'_'.$timestamp.'.'.$name->extension;
                        if ($name->saveAs($path)) {
                            $nama_foto = $name->baseName.'_'.$timestamp.'.'.$name->extension;
                            $file = '/foto_galeri/' .$name->baseName.'_'.$timestamp.'.'.$name->extension;
                            Yii::$app->db->createCommand()->insert('foto_galeri', ['id_galeri' => $galeri, 'nama_foto' => $nama_foto, 'created_by' => $creator_name, 'created_date' => $creator_date, 'file' => $file, 'status' => $status])->execute();
                        }
                    }
                }
            }else{
                return $model->getErrors();
            }
            Yii::$app->session->setFlash('success', 'Data berhasil ditambah.');
            return $this->redirect(['view', 'id' => $model->galeri_id]);
        }
        //     return $this->redirect(['view', 'id' => $model->galeri_id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Galeri model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->galeri_id]);
        // }
        if ($model->load(Yii::$app->request->post())) {
            // Yii::$app->creator->update($model);
            $model->updated_by = Yii::$app->user->identity->username;
       	    $model->updated_date = date("Y-m-d");
            $model->save();
            return $this->redirect(['view', 'id' => $model->galeri_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Galeri model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Data berhasil dihapus.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Galeri model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Galeri the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Galeri::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
