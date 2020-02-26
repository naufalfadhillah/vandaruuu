<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $pelanggan_id
 * @property string $pelanggan_nama
 * @property string $pelanggan_jk
 * @property string $pelanggan_alamat
 * @property string $pelanggan_tgl_lahir
 * @property string $pelanggan_no_hp
 *
 * @property Booking[] $bookings
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelanggan_nama', 'pelanggan_jk', 'pelanggan_alamat', 'pelanggan_tgl_lahir', 'pelanggan_no_hp'], 'required'],
            [['pelanggan_jk', 'pelanggan_alamat'], 'string'],
            [['pelanggan_tgl_lahir'], 'safe'],
            [['pelanggan_nama'], 'string', 'max' => 50],
            [['pelanggan_no_hp'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pelanggan_id' => 'Pelanggan ID',
            'pelanggan_nama' => 'Pelanggan Nama',
            'pelanggan_jk' => 'Pelanggan Jk',
            'pelanggan_alamat' => 'Pelanggan Alamat',
            'pelanggan_tgl_lahir' => 'Pelanggan Tgl Lahir',
            'pelanggan_no_hp' => 'Pelanggan No Hp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['booking_id_pelanggan' => 'pelanggan_id']);
    }
}
