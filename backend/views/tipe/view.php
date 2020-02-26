<?php

use common\models\Fasilitas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\FasilitasSearch;

/* @var $this yii\web\View */
/* @var $model common\models\Tipe */

$this->title = $model->tipe_nama;
$this->params['breadcrumbs'][] = ['label' => 'Tipe', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$query = Fasilitas::find();
$fasilitas = $query->all();
$tipe = $model;
?>
<div class="tipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tipe_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tipe_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php // DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         // 'tipe_id',
    //         'tipe_nama',
    //         'tipe_harga',
    //         'tipe_deskripsi:ntext',
    //         'tipe_fasilitas:ntext',
    //         'tipe_gambar',
    //     ],
    // ]) ?>

    <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="prod_title">Deskripsi :</h3>
                </div>
                <div class="box-body">
                    <p><?= $model->tipe_deskripsi ?></p>
                </div>
                <div class="box-body">
                    <div class="product_price">
                        <h3> Harga : </h3><h1 class="price"><?php echo "Rp. ".number_format($model->tipe_harga); ?></h1>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="prod_title">Fasilitas :</h3>
                </div>
                <div class="box-body">
                    <?php 
                    $uu=$model->tipe_fasilitas;
                    $ccd=explode(",",$uu);
                    // print_r($fasilitas);
                    // exit();
                    ?>
                    <?php foreach ($fasilitas as $j ) : ?>
                    <div class="col-md-4">
                        <input type="checkbox" name="fasilitas[]" value="<?php echo ' '.$j['fasilitas_id']; ?>" <?php if(in_array($j['fasilitas_id'],$ccd)){echo "checked";}?> disabled>
                        <label for="fasilitas"><?php echo $j['fasilitas_nama']; ?></label><br>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>         
        </div>
    </div>
    <hr><!--Foto Layout-->
    <!-- <div class="row">
        <?php 
            // $no=0; 
            // foreach ($gambar->result_array() as $i) : 
            // $no++;  ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <div class="image view view-first">
                        <img src="<?php //echo base_url().'assets/images/'.$i['gambar_file'];?>" onclick="openModal();currentSlide(<?php //echo $no; ?>)" class="hover-shadow" width="100%" height="100%">
                        <div class="mask">
                            <p><?php //echo $i['gambar_judul']; ?></p>
                            <div class="tools tools-bottom">
                                <a href="#" onclick="openModal();currentSlide(<?php //echo $no; ?>)"><i class="fa fa-eye"></i></a>
                                <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php //echo $i['gambar_id'];?>"><span class="fa fa-pencil"></span></a>
                                <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php //echo $i['gambar_id'];?>"><span class="fa fa-trash"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="caption">
                        <h4><?php //echo $i['gambar_judul']; ?></h4>
                    </div>
               </div>
            </div>
        <?php //endforeach; ?>
    </div>

    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">
            <?php
                // $no=0;
                // foreach ($gambar->result_array() as $i) : 
                // $no++;  ?>
                <div class="mySlides">
                    <img src="<?php //echo base_url().'assets/images/'.$i['gambar_file'];?>" style="width:100%" >
                </div>   
            <?php // endforeach; ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
    </div>                         -->

    <div class="kt-widget1">
        <div class="foto-kamar-index">
            <p>
                <?= Html::a('Tambah Foto', ['foto-kamar/create', 'tipe' => $tipe->tipe_id], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="table-responsive">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'layout' => '{items}{summary}{pager}',
                        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'foto_kamar',
                            'contentOptions' => ['style'=>'vertical-align: middle;'],
                        ],
                                    // [
                                    //     'attribute' => 'Keterangan_foto',
                                    //     'format' => 'html',    
                                    //     'value' => function ($data) {
                                    //         if (strlen($data->Keterangan_foto) > 200) {
                                    //             return substr($data->Keterangan_foto, 0, 200) . '. . . . .';
                                    //         } else return $data->Keterangan_foto;
                                    //     },
                                    //     'contentOptions' => ['style'=>'vertical-align: middle;'],
                                    // ],
                        [
                            'attribute' => 'file',
                            'format' => 'html',    
                            'value' => function ($data) {
                                return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                                ['width' => '100px']);
                                // echo Yii::getAlias('@web').'/'. $data['file'];
                            },
                            'label' => 'Foto',
                            'contentOptions' => ['style'=>'vertical-align: middle;'],
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($data) {
                                if ($data->status == 'Aktif') {
                                    $content = Html::tag('p', 'Aktif', ['class' => 'kt-badge kt-badge--inline kt-badge--success']);
                                } else {
                                    $content = Html::tag('p', 'Tidak Aktif', ['class' => 'kt-badge kt-badge--inline kt-badge--danger']);
                                }
                                return Html::tag('span', $content);
                             },
                            'contentOptions' => ['class' => 'text-center', 'style'=>'vertical-align: middle;'], 
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'buttons' => [
                                'view' => function ($url, $model) use ($tipe) {
                                $url = Url::to(['foto-kamar/view', 'id' => $model->foto_id_foto, 'tipe' => $tipe->tipe_id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'view'),'class' => 'btn btn-info btn-xs',
                                ]);
                                },
                                'update' => function ($url, $model) use ($tipe) {
                                $url = Url::to(['foto-kamar/update', 'id' => $model->foto_id_foto, 'tipe' => $tipe->tipe_id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,[
                                    'title' => Yii::t('app', 'update'),'class' => 'btn btn-primary btn-xs',
                                ]);
                                },
                                'delete' => function ($url, $model) use ($tipe) {
                                $url = Url::to(['foto-kamar/delete', 'id' => $model->foto_id_foto, 'tipe' => $tipe->tipe_id]);
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'delete'),'class' => 'btn btn-danger btn-xs',
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'data-method'  => 'post',
                                    ]);
                                }
                            ],
                        ],
                    ],
                ]); ?>
              <?php Pjax::end(); ?>
            </div>
        </div>
    </div>

</div>