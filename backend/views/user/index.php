<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
            <h1><?php // Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'username',
                    // 'auth_key',
                    // 'password_hash',
                    // 'password_reset_token',
                    'first_name',
                    'last_name',
                    'email:email',
                    // 'status',
                    //'gander',
                    // 'hp',
                    // 'role',
                    [
                        'attribute' => 'Role',
                        'value' => function($model){
                            if ($model->role == 1){
                                return 'Super Admin';
                            }else{
                                return 'Admin';
                            }
                        }
                    ],
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'widget:100px, align:center;'],
                        'header' => 'Actions',
                        'template' => '{view} &nbsp {update} &nbsp {delete}',
                        'buttons' => [
                                'view' => function($url, $model, $key){
                                    return Html::a('<i class ="glyphicon glyphicon-eye-open"></i>',['view', 'id'=>$model->id], [
                                        'class' => 'btn btn-success btn-xs'
                                    ]);
                                },
                                'update' => function($url, $model, $key) {
                                    return Html::a('<i class ="glyphicon glyphicon-pencil"></i> ', ['update', 'id'=>$model->id], [
                                        'class' => 'btn btn-primary btn-xs',
                                        ]);
                                },
                                'delete' => function($url, $model, $key){
                                    return Html::a('<i class = "glyphicon glyphicon-trash"></i>',['delete', 'id'=>$model->id], [
                                        'class' => 'btn btn-warning btn-xs',
                                    ]);
                                }
                        ]
                    ],
                ],
            ]); ?>
</div>
