<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            'fasilitas_nama' => 'Nama Fasilitas',
        ];
    }

    public static function getFasilitasList()
    {
        $data =  static::find()
            ->select(['fasilitas_id', 'fasilitas_nama'])
            ->orderBy('fasilitas_nama')->asArray()->all();
        return ArrayHelper::map($data, 'fasilitas_id', 'fasilitas_nama');
    }
}
