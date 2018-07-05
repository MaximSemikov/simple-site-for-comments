<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

$m = $model;
?>
<div class="comments">
    <?php Pjax::begin(); ?>
    <?php if ($comments): ?>
        <?php foreach ($comments as $comment): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comment-title">
                        <span class="name"><?= $comment->username; ?></span><span
                                class="date"><?= date('H:i d.m.Y', $comment->posted_at); ?></span>
                    </div>
                    <div class="comment-content">
                        <?= $comment->content; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row text-center">
            <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
        </div>
    <?php else: ?>
        <p>Пока нет комментариев</p>
    <?php endif; ?>
    <?php Pjax::end(); ?>
</div>
<hr/>
<?php $form = ActiveForm::begin(['options' => ['class' => 'comment-form', 'method' => 'comment/index']]); ?>
<h1 class="form-title">Оставить комментарий</h1>
<?= $form->field($m, 'username')->textInput(['placeholder' => 'Введите ваше имя...']); ?>
<?= $form->field($m, 'content')->textarea(['rows' => 6]); ?>
<?php
$submitButton = Html::submitButton('Отправить', ['class' => 'btn btn-default']);
?>
<?= $submitButton; ?>
<?php ActiveForm::end(); ?>

