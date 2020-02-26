<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $content_id
 * @property string $content_judul
 * @property string $content_isi
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 * @property string $status
 * @property string $file
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filesaver;
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_judul', 'content_isi'], 'required'],
            [[ 'content_isi'], 'string'],
            [['filesaver'], 'file'],
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by','content_judul', 'status'], 'string', 'max' => 100],
            [['file'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'content_id' => 'Content ID',
            'content_judul' => 'Judul',
            'content_isi' => 'Isi Content',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'file' => 'Foto Sampul',
        ];
    }
}
