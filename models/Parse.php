<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parse".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $price
 * @property int $phone
 * @property string $photo
 * @property int $view
 * @property int $date
 * @property int $code
 * @property string $agent
 */
class Parse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $price_start;
    public $price_end;
    public $searchTitle;
    public static function tableName()
    {
        return 'parse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'content', 'title', 'content'], 'string'],
            [['summ'], 'integer'],
            [[ 'phone'], 'string', 'max' => 255],
            [[ 'price_start','price_end', 'searchTitle'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Адрес',
            'content' => 'Content',
            'price' => 'Цена',
            'phone' => 'Телефон',
            'photo' => 'Photo',
            'integer' => 'View',
            'date' => 'Date',
            'code' => 'Code',
            'price_start' => 'Начальная цена',
            'price_end' => 'конечная цена',
            'searchTitle' =>'Поиск в адресе',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ParseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParseQuery(get_called_class());
    }
}
