<?php

namespace frontend\models;


use yii\base\Model;
use yii\helpers\Html;

class CommentForm extends Model
{
    public $username;
    public $content;

    public function rules()
    {
        return [
            [['username', 'content'], 'required'],
            [['username', 'content'], 'trim'],
            ['username', 'string', 'length' => [3, 16]],
            ['username', 'match', 'pattern' => '/^[a-zёа-я]+$/iu'],
            ['content', 'string', 'length' => [4, 160]],
            ['content', 'match', 'pattern' => '/^[.,:!?\'"\d\sa-zёа-я]+$/iu', 'message' => 'Комментарий может
             содержать только буквы русского/английского алфавита, цифры и знаки препинания(.,:!?")!'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Ваше имя',
            'content' => 'Ваш комментарий',
        ];
    }

    public function addComment()
    {

        $comment = new Comment();
        $comment->username = Html::encode($this->username);
        $comment->content = Html::encode($this->content);
        $comment->posted_at = time();
        $comment->ip_address = getenv('REMOTE_ADDR');

        if ($comment->validate() && $comment->save()) {
            return true;
        } else {
            return false;
        }
    }
}