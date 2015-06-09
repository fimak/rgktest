<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <form class="container-fluid" id="book-search">
        <div class="row form-group">
            <?= Html::dropDownList('BookSearch[author_id]', $searchModel->author_id, \app\models\Author::getAuthors(), [
                'class' => 'form-control',
                'id' => 'book-author'
            ])?>
            <?= Html::input('text', 'BookSearch[name]', $searchModel->name, [
                'class' => 'form-control',
                'id' => 'book-name',
                'placeholder' => 'Название книги'
            ])?>
        </div>
        <div class="row form-group">
            <?= Html::label('Дата выхода книги:', 'date-from')?>
            <?= Html::input('text', 'BookSearch[from]', $searchModel->from, [
                'class' => 'form-control datepicker',
                'id' => 'date-from'
            ])?>
            <?= Html::label('до', 'date-to')?>
            <?= Html::input('text', 'BookSearch[to]', $searchModel->to, [
                'class' => 'form-control datepicker',
                'id' => 'date-to',
            ])?>
            <?= Html::submitButton('Искать', ['class' => 'pull-right btn btn-primary', 'id' => 'search'])?>
        </div>
    </form>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            [
                'attribute' => 'preview',
                'format' => 'html',
                'value' => function ($data) {
                        return Html::img($data->imageurl, ['class' => 'preview']);
                    },
            ],
            [
                'attribute' => 'author',
                'value' => 'author.fullname',
            ],
            'date',
            'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {delete}',
                'header' => 'Кнопки действий',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            $url,
                            ['title' => 'Update', 'target' => 'blank']
                        );
                    },
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                $url,
                                ['title' => 'View', 'class' => 'view']
                            );
                        },
                ],
                'contentOptions' => ['class' => 'operations'],
                'visible' => !Yii::$app->user->isGuest
            ],
        ],
    ]); ?>

</div>
