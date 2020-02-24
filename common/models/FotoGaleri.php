<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "foto_galeri".
 *
 * @property int $id
 * @property int $id_galeri
 * @property string $nama_foto
 * @property string $Keterangan_foto
 * @property string $file
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $status
 *
 * @property Galeri $galeri
 */
class FotoGaleri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filesaver, $filesaver2;
    public static function tableName()
    {
        return 'foto_galeri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id_galeri', 'nama_foto', 'Keterangan_foto', 'file', 'status'], 'required'],
            [['id_galeri'], 'integer'],
            [['Keterangan_foto'], 'string'],
            [['filesaver'], 'file', 'maxFiles' => 10, 'extensions' => 'png, jpg, jpeg'],
            [['filesaver2'], 'file'],
            [['created_date', 'updated_date'], 'safe'],
            [['nama_foto', 'file', 'created_by', 'updated_by', 'status'], 'string', 'max' => 100],
            [['id_galeri'], 'exist', 'skipOnError' => true, 'targetClass' => Galeri::className(), 'targetAttribute' => ['id_galeri' => 'galeri_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_galeri' => 'Id Galeri',
            'nama_foto' => 'Nama Foto',
            'Keterangan_foto' => 'Keterangan Foto',
            'file' => 'File',
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
    public function getGaleri()
    {
        return $this->hasOne(Galeri::className(), ['galeri_id' => 'id_galeri']);
    }
}
