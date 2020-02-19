<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kamar".
 *
 * @property int $kamar_id
 * @property string $kamar_nama
 * @property string $kamar_type
 * @property int $kamar_harga
 * @property string $kamar_deskripsi
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $kamar_status
 *
 * @property Booking[] $bookings
 * @property FotoKamar[] $fotoKamars
 */
class Kamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filesaver;
    public static function tableName()
    {
        return 'kamar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kamar_nama', 'kamar_type', 'kamar_harga'], 'required'],
            [['kamar_harga'], 'integer'],
            [['filesaver'], 'file', 'maxFiles' => 10, 'extensions' => 'png, jpg, jpeg'],
            [['kamar_deskripsi', 'kamar_status','kamar_foto'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['kamar_nama', 'kamar_type'], 'string', 'max' => 30],
            [['created_by', 'updated_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kamar_id' => 'Kamar ID',
            'kamar_nama' => 'Kamar Nama',
            'kamar_type' => 'Kamar Type',
            'kamar_harga' => 'Kamar Harga',
            'kamar_foto' => 'Foto Kamar',
            'kamar_deskripsi' => 'Kamar Deskripsi',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'kamar_status' => 'Kamar Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['booking_id_kamar' => 'kamar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotoKamars()
    {
        return $this->hasMany(FotoKamar::className(), ['foto_id_kamar' => 'kamar_id']);
    }
    public function getKamar(){

    }
}
