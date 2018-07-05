<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.07.2018
 * Time: 18:14
 */

namespace frontend\controllers;


use frontend\models\Comment;
use frontend\models\CommentForm;
use yii\web\Controller;
use yii\helpers\Url;

class CommentController extends AppController
{
    public function actionIndex()
    {
        $model = new CommentForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if ($model->addComment()){
                \Yii::$app->session->setFlash('success', "Комментарий успешно опубликован...");
                return $this->redirect(Url::to(['/comment/index']));
            } else {
                \Yii::$app->session->setFlash('error', "Не удалось опубликовать комментарий...");
                return $this->redirect(Url::to(['/comment/index']));
            }
        }
        $query = Comment::find()->orderBy(['posted_at'=>SORT_DESC]);
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 5,
            'pageSizeParam' => false, 'forcePageParam' => false]);
        $comments = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('model', 'pages', 'comments'));
    }
}