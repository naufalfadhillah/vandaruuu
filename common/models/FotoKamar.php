<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "foto_kamar".
 *
 * @property int $foto_id_foto
 * @property int $foto_id_kamar
 * @property string $foto_kamar
 * @property string $file
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $status
 *
 * @property Kamar $fotoIdKamar
 */
class FotoKamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filesaver,$filesaver2;
    public static function tableName()
    {
        return 'foto_kamar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto_id_tipe'], 'required'],
            [['foto_id_tipe'], 'integer'],
            [['filesaver'], 'file', 'maxFiles' => 10, 'extensions' => 'png, jpg, jpeg'],
            [['filesaver2'], 'file'],
            [['foto_kamar', 'file'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by', 'status'], 'string', 'max' => 100],
            [['foto_id_kamar'], 'exist', 'skipOnError' => true, 'targetClass' => Kamar::className(), 'targetAttribute' => ['foto_id_kamar' => 'kamar_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'foto_id_foto' => 'id Foto',
            'foto_id_tipe' => 'id tipe',
            'foto_kamar' => 'Foto Kamar',
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
    public function getFotoIdTipe()
    {
        return $this->hasOne(Tipe::className(), ['tipe_id' => 'foto_id_tipe']);
    }
}
