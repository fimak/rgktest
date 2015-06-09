<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview')->fileInput() ?>
    <?php if (!$model->isNewRecord) : ?>
        <div class="form-group">
            <img src="<?= $model->getImageUrl() ?>" alt="preview" width="64px" height="48px"/>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'author_id')->dropDownList(\app\models\Author::getAuthors()) ?>

    <?= $form->field($model, 'date')->textInput(['class' => 'form-control datepicker']) ?>

    <?php if (!$model->isNewRecord) : ?>
        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
