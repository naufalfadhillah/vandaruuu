<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $pembayaran_id
 * @property int $pembayaran_id_booking
 * @property int $pembayaran_jumlah
 * @property string $pembayaran_tgl_bayar
 * @property string $pembayaran_resi
 * @property string $status
 *
 * @property Booking $pembayaranIdBooking
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pembayaran_id_booking', 'pembayaran_jumlah', 'pembayaran_resi', 'status'], 'required'],
            [['pembayaran_id_booking', 'pembayaran_jumlah'], 'integer'],
            [['pembayaran_tgl_bayar'], 'safe'],
            [['pembayaran_resi', 'status'], 'string'],
            [['pembayaran_id_booking'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['pembayaran_id_booking' => 'booking_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pembayaran_id' => 'Pembayaran ID',
            'pembayaran_id_booking' => 'Pembayaran Id Booking',
            'pembayaran_jumlah' => 'Pembayaran Jumlah',
            'pembayaran_tgl_bayar' => 'Pembayaran Tgl Bayar',
            'pembayaran_resi' => 'Pembayaran Resi',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaranIdBooking()
    {
        return $this->hasOne(Booking::className(), ['booking_id' => 'pembayaran_id_booking']);
    }
}
