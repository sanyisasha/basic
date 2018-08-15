<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SettingsModel extends Model
{
    public $username;
    public $email;
    public $password;
    public $password2;

    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['username', 'validateUserExists'],
            ["email", "email"],
            ['email', 'validateEmailExists'],
            ['password','string','min' => 6],
            ['password2', 'validatePasswordMatch'],
            ['password2', 'string',  'min' => 6]
        ];
    }


    public function validatePasswordMatch($attribute, $params) {
        if (!$this->hasErrors()) {
            if ($this->password !== $this->password2 && !empty($this->password)) {
                $this->addError($attribute, 'A két jelszó nem egyezik.');
            }
        }
    }

    public function validateUserExists($attribute, $params) {
        if (!$this->hasErrors()) {
            if (User::findByUser($this->username) && $this->username != Yii::$app->getUser()->identity->username) {
                $this->addError($attribute, 'Létező felhasználónév.');
            }
        }
    }

    public function validateEmailExists($attribute, $params) {
        if (!$this->hasErrors()) {
            if (User::findByEmail($this->email)  && $this->email != Yii::$app->getUser()->identity->email) {
                $this->addError($attribute, 'Létező e-mail.');
            }
        }
    }


    public function change() {
        if ($this->validate()) {
            $newUser = Yii::$app->getUser()->identity;
            $newUser->username = $this->username;
            $newUser->email = $this->email;
            if (!empty($this->password)) {
                $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
                $newUser->password = $hash;
            }
            $newUser->save();
            return true;
        }
    }


}