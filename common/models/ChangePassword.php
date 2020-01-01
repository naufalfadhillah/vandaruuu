<?php 
namespace common\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use common\models\User;
 
class ChangePassword extends Model
{
    public $id;
    public $new_password;
    public $confirm_password;
    public $old_password;
 
    private $_user;
 
    public function __construct($id, $config = [])
    {
        $this->_user = User::findIdentity($id);
        
        if (!$this->_user) {
            throw new InvalidParamException('Unable to find user!');
        }
        
        $this->id = $this->_user->id;
        parent::__construct($config);
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['new_password','confirm_password','old_password'], 'required'],
            [['new_password','confirm_password','old_password'], 'string', 'min' => 6],
            ['old_password','validatePassword'],
            ['confirm_password', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }
 
    public function changePassword()
    {
        $user = $this->_user;
        $user->setPassword($this->new_password);
 
        return $user->save(false);
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->_user;
            if (!$user || !$user->validatePassword($this->old_password)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }
}