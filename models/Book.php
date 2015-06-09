<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $preview
 * @property integer $author_id
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'preview', 'author_id', 'date'], 'required'],
            [['author_id'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['name', 'preview'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'preview' => 'Превью',
            'author' => 'Автор',
            'date' => 'Дата выхода книги',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обнавления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getImageUrl()
    {
        return Url::to('@web/upload/' . $this->preview, true);
    }
}
