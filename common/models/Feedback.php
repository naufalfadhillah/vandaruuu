<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $feedback_id
 * @property int $feedback_id_booking
 * @property string $feedback_isi
 * @property string $feedback_tanggal
 *
 * @property Booking $feedbackIdBooking
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback_id_booking', 'feedback_isi'], 'required'],
            [['feedback_id_booking'], 'integer'],
            [['feedback_isi'], 'string'],
            [['feedback_tanggal'], 'safe'],
            [['feedback_id_booking'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['feedback_id_booking' => 'booking_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'feedback_id' => 'Feedback ID',
            'feedback_id_booking' => 'Feedback Id Booking',
            'feedback_isi' => 'Feedback Isi',
            'feedback_tanggal' => 'Feedback Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackIdBooking()
    {
        return $this->hasOne(Booking::className(), ['booking_id' => 'feedback_id_booking']);
    }
}
