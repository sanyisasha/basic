<?php

namespace app\models;

use Faker\Provider\DateTime;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class NewPostForm extends Model
{
    public $title;
    public $prolog;
    public $text;

    public $user;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title', 'prolog', 'text'], 'required'],
            ['title', 'string', 'max' => 30],
            ['prolog', 'string', 'max' => 200],
            ['text', 'string', 'min' => 30]
        ];
    }

    public function newPost() {
        $post = new Post();

        $post->title = $this->title;
        $post->prolog = $this->prolog;
        $post->text = $this->text;
        $post->createdat = date('Y:m:d h:i:s', time());
        $post->userid = Yii::$app->getUser()->id;

        $post->save();
        return true;
    }

}
