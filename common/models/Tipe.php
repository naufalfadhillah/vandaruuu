<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipe".
 *
 * @property int $tipe_id
 * @property string $tipe_nama
 * @property int $tipe_harga
 * @property string $tipe_deskripsi
 * @property string $tipe_fasilitas
 * @property string $tipe_gambar
 *
 * @property FotoKamar[] $fotoKamars
 * @property Kamar[] $kamars
 */
class Tipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filesaver;
    public static function tableName()
    {
        return 'tipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipe_harga'], 'integer'],
            [['tipe_deskripsi'], 'string'],
            [['filesaver'], 'file', 'maxFiles' => 10, 'extensions' => 'png, jpg, jpeg'],
            [['tipe_nama', 'tipe_gambar'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipe_id' => 'ID Tipe',
            'tipe_nama' => 'Nama Tipe',
            'tipe_harga' => 'Harga',
            'tipe_deskripsi' => 'Deskripsi',
            'tipe_fasilitas' => 'Fasilitas',
            'tipe_gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotoKamars()
    {
        return $this->hasMany(FotoKamar::className(), ['foto_id_tipe' => 'tipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKamars()
    {
        return $this->hasMany(Kamar::className(), ['kamar_tipe' => 'tipe_id']);
    }
}
