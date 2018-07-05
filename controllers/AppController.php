<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.07.2018
 * Time: 18:17
 */

namespace frontend\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    public function debug($a)
    {
        echo '<pre>';
        print_r($a);
        echo '</pre>';
    }
}