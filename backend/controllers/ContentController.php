<?php

namespace backend\controllers;

use Yii;
use common\models\Content;
use common\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->content_id]);
        // }

        if ($model->load(Yii::$app->request->post())) {

            if (UploadedFile::getInstance($model, 'filesaver') != null) {
                // Photo Upload
                $imageName = $model->content_id;
                $model->filesaver = UploadedFile::getInstance($model, 'filesaver');
                $timestamp = time(); // The Uniqueness
                $model->filesaver->saveAs( 'berita/'.$imageName.'_'.$timestamp.'.'.$model->filesaver->extension, false ); // Save The File
                $model->file = 'berita/'.$imageName.'_'.$timestamp.'.'.$model->filesaver->extension; // Save The Path
            }

            // Creator
            $model->created_by = Yii::$app->user->identity->username;
		    $model->created_date = date("Y-m-d");

            // Model Save
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil ditambah.');
            // Let's Go-to The View
            return $this->redirect(['view', 'id' => $model->content_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data = $model;

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->content_id]);
        // }

        if ($model->load(Yii::$app->request->post())) {

            // Conditional If New Photo Uploaded
            if (UploadedFile::getInstance($model, 'filesaver') != null) {

                // Delete Last File
                if (file_exists($data->file)) { // Check if The File Exist
                    unlink($data->file); // Delete The File
                }
                
                // Photo Upload
                $imageName = $model->content_id;
                $model->filesaver = UploadedFile::getInstance($model, 'filesaver');
                $timestamp = time(); // The Uniqueness
                $model->filesaver->saveAs( 'berita/'.$imageName.'_'.$timestamp.'.'.$model->filesaver->extension, false );
                $model->file = 'berita/'.$imageName.'_'.$timestamp.'.'.$model->filesaver->extension;
            }

            // Creator
            $model->updated_by = Yii::$app->user->identity->username;
            $model->updated_date = date("Y-m-d");

            // Model Save
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->content_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

        // return $this->redirect(['index']);
        $data = $this->findModel($id);
        if (file_exists($data->file)) { // Check if The File Exist
            unlink($data->file); // Delete The File
        }        
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Data berhasil dihapus.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
