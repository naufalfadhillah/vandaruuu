<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "galeri".
 *
 * @property int $galeri_id
 * @property string $galeri_nama
 * @property string $galeri_keterangan
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $status
 *
 * @property FotoGaleri[] $fotoGaleris
 */
class Galeri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     public $filesaver;
    public static function tableName()
    {
        return 'galeri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['galeri_nama', 'galeri_keterangan', 'status'], 'required'],
            [['galeri_keterangan'], 'string'],
            [['filesaver'], 'file', 'maxFiles' => 10, 'extensions' => 'png, jpg, jpeg'],
            [['created_date', 'updated_date'], 'safe'],
            [['galeri_nama', 'created_by', 'updated_by', 'status'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'galeri_id' => 'Galeri ID',
            'galeri_nama' => 'Galeri Nama',
            'galeri_keterangan' => 'Galeri Keterangan',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotoGaleris()
    {
        return $this->hasMany(FotoGaleri::className(), ['id_galeri' => 'galeri_id']);
    }
}
