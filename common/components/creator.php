<?php 
namespace common\components;

use yii\base\Component;

use Yii;

class Creator extends Component{
	public function create($model)
	{
		$model->created_by = Yii::$app->user->identity->username;;
		$model->created_date = date("Y-m-d");
	}

	public function update($model)
	{
		$model->updated_by = Yii::$app->user->identity->username;
       	$model->updated_date = date("Y-m-d");
	}
}

 ?>