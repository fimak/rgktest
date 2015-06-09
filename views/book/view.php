<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'Превью',
                'format' => 'html',
                'value' => Html::img($model->imageurl, ['class' => 'preview']),
            ],
            [
                'label' => 'Автор',
                'value' => $model->author->fullname,
            ],
            'date',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
