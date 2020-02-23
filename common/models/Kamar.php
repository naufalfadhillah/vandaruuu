<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kamar".
 *
 * @property int $kamar_id
 * @property string $kamar_nama
 * @property int $kamar_tipe
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $kamar_status
 *
 * @property Booking[] $bookings
 * @property Tipe $kamarTipe
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
            [['kamar_nama', 'kamar_tipe', 'kamar_status'], 'required'],
            [['kamar_tipe'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['kamar_status'], 'string'],
            [['kamar_nama'], 'string', 'max' => 30],
            [['created_by', 'updated_by'], 'string', 'max' => 100],
            [['kamar_tipe'], 'exist', 'skipOnError' => true, 'targetClass' => Tipe::className(), 'targetAttribute' => ['kamar_tipe' => 'tipe_id']],
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
            'kamar_tipe' => 'Kamar Tipe',
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
    public function getKamarTipe()
    {
        return $this->hasOne(Tipe::className(), ['tipe_id' => 'kamar_tipe']);
    }
}
