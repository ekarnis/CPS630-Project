<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MovieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'movie_name') ?>

    <?= $form->field($model, 'movie_logo') ?>

    <?= $form->field($model, 'movie_runningtime') ?>

    <?= $form->field($model, 'movie_year') ?>

    <?= $form->field($model, 'movie_director') ?>

    <?= $form->field($model, 'movie_actors') ?>

    <?= $form->field($model, 'movie_genre') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
