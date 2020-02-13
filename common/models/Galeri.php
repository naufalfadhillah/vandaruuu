<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "galeri".
 *
 * @property int $galeri_id
 * @property string $galeri_gambar
 * @property string $galeri_deskripsi
 */
class Galeri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['galeri_gambar', 'galeri_deskripsi'], 'required'],
            [['galeri_gambar', 'galeri_deskripsi'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'galeri_id' => 'Galeri ID',
            'galeri_gambar' => 'Galeri Gambar',
            'galeri_deskripsi' => 'Galeri Deskripsi',
        ];
    }
}
