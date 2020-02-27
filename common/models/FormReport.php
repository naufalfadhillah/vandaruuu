<?php
namespace common\models;

use yii\base\Model;

/**
 * Signup form
 */
class FormReport extends Model
{
    public $dari;
    public $sampai;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dari','sampai'], 'required'],
            [['dari','sampai'], 'string'],
            // ['password', 'required'],
            // ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    // public function signup()
    // {
    //     if (!$this->validate()) {
    //         return null;
    //     }
        
    //     $user = new User();
    //     $user->username = $this->username;
    //     $user->email = $this->email;
    //     $user->setPassword($this->password);
    //     $user->generateAuthKey();
        
    //     return $user->save() ? $user : null;
    // }
}
