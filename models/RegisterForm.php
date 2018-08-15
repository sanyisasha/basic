<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password2;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password2'], 'required'],
            ['username', 'validateUserExists'],
            ["email", "email"],
            ['email', 'validateEmailExists'],
            ['password2', 'validatePasswordMatch'],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function validatePasswordMatch($attribute, $params) {
        if (!$this->hasErrors()) {
            if ($this->password !== $this->password2) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function validateUserExists($attribute, $params) {
        if (!$this->hasErrors()) {
            if (User::findByUser($this->username)) {
                $this->addError($attribute, 'Létező felhasználónév.');
            }
        }
    }

    public function validateEmailExists($attribute, $params) {
        if (!$this->hasErrors()) {
            if (User::findByEmail($this->email)) {
                $this->addError($attribute, 'Létező e-mail.');
            }
        }
    }


    public function register() {
        if ($this->validate()) {
            $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);

            $newUser = new User;
            $newUser->username = $this->username;
            $newUser->email = $this->email;
            $newUser->password = $hash;
            $newUser->save();
            return true;
        }
    }


}