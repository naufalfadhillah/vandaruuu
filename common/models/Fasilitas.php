<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fasilitas".
 *
 * @property int $fasilitas_id
 * @property string $fasilitas_nama
 */
class Fasilitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fasilitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fasilitas_nama'], 'required'],
            [['fasilitas_nama'], 'string', 'max' => 2550],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fasilitas_id' => 'Fasilitas ID',
            'fasilitas_nama' => 'Fasilitas Nama',
        ];
    }
}
