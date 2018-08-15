<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

class Post extends \yii\db\ActiveRecord
{
    public $userObject;

    public static function tableName() {
        return "posts";
    }

    public function getUser() {
        return $this->hasOne(User::className(),["id" => "userid"]);
    }

    public static function getPosts() {
        return static::find()->all();
    }
}