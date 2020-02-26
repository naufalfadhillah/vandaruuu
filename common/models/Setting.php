<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id_setting
 * @property string $setting_nama
 * @property string $setting_alamat
 * @property string $setting_email
 * @property string $setting_phone
 * @property string $setting_fax
 * @property string $setting_facebook
 * @property string $setting_instagram
 * @property string $setting_whatsapp
 * @property string $latitudeP
 * @property string $longitudeP
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['latitudeP', 'longitudeP'], 'string'],
            [['setting_nama', 'setting_email', 'setting_phone', 'setting_fax', 'setting_facebook', 'setting_instagram', 'setting_whatsapp'], 'string', 'max' => 100],
            [['setting_alamat'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_setting' => 'Id Setting',
            'setting_nama' => 'Setting Nama',
            'setting_alamat' => 'Setting Alamat',
            'setting_email' => 'Setting Email',
            'setting_phone' => 'Setting Phone',
            'setting_fax' => 'Setting Fax',
            'setting_facebook' => 'Setting Facebook',
            'setting_instagram' => 'Setting Instagram',
            'setting_whatsapp' => 'Setting Whatsapp',
            'latitudeP' => 'Latitude P',
            'longitudeP' => 'Longitude P',
        ];
    }
}
