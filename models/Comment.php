<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.07.2018
 * Time: 21:42
 */

namespace frontend\models;


use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
    public static function tableName()
    {
        return 'comment';
    }

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
}