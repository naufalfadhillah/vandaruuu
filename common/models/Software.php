<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 26/02/20
 * Time: 0:03
 */

namespace common\models;


use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use common\models\Kamar;
class Software extends ActiveRecord
{
    public function getKamarList(){
        $kamar = Kamar::find()->select(['kamar_id','kamar_nama'])->orderBy('kamar_nama')->asArray()->all();
        return ArrayHelper::map($kamar, 'kamar_id', 'kamar_nama');
    }
}