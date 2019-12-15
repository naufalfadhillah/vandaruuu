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
 * @property string $kamar_foto
 * @property string $kamar_status
 *
 * @property Booking[] $bookings
 */
class Kamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['kamar_nama', 'kamar_type', 'kamar_harga', 'kamar_deskripsi', 'kamar_foto', 'kamar_status'], 'required'],
            [['kamar_harga'], 'integer'],
            [['kamar_deskripsi', 'kamar_foto', 'kamar_status'], 'string'],
            [['kamar_nama', 'kamar_type'], 'string', 'max' => 30],
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
            'kamar_deskripsi' => 'Kamar Deskripsi',
            'kamar_foto' => 'Kamar Foto',
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
}
