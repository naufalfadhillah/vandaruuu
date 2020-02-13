<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $booking_id
 * @property int $booking_id_pelanggan
 * @property int $booking_id_kamar
 * @property int $booking_durasi
 * @property string $booking_tgl_pesan
 * @property string $booking_tgl_check_in
 * @property string $booking_status
 *
 * @property Kamar $bookingIdKamar
 * @property Pelanggan $bookingIdPelanggan
 * @property Feedback[] $feedbacks
 * @property Pembayaran[] $pembayarans
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id_pelanggan', 'booking_id_kamar', 'booking_durasi', 'booking_tgl_check_in', 'booking_status'], 'required'],
            [['booking_id_pelanggan', 'booking_id_kamar', 'booking_durasi'], 'integer'],
            [['booking_tgl_pesan', 'booking_tgl_check_in'], 'safe'],
            [['booking_status'], 'string'],
            [['booking_id_kamar'], 'exist', 'skipOnError' => true, 'targetClass' => Kamar::className(), 'targetAttribute' => ['booking_id_kamar' => 'kamar_id']],
            [['booking_id_pelanggan'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::className(), 'targetAttribute' => ['booking_id_pelanggan' => 'pelanggan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'booking_id' => 'Booking ID',
            'booking_id_pelanggan' => 'Booking Id Pelanggan',
            'booking_id_kamar' => 'Booking Id Kamar',
            'booking_durasi' => 'Booking Durasi',
            'booking_tgl_pesan' => 'Booking Tgl Pesan',
            'booking_tgl_check_in' => 'Booking Tgl Check In',
            'booking_status' => 'Booking Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookingIdKamar()
    {
        return $this->hasOne(Kamar::className(), ['kamar_id' => 'booking_id_kamar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookingIdPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['pelanggan_id' => 'booking_id_pelanggan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['feedback_id_booking' => 'booking_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::className(), ['pembayaran_id_booking' => 'booking_id']);
    }
}
