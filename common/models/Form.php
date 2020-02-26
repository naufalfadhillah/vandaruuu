<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 26/02/20
 * Time: 0:05
 */

namespace common\models;

use common\models\Software;
class Form
{
    public $booking_id_kamar;
    public function rules()
    {
        return [

        ['booking_id_kamar', 'each', 'rule' => [
            'exist', 'tagetClass' => Software::className(),  'targetAttribute' => 'kamar_id']
        ],

    ];
}
}