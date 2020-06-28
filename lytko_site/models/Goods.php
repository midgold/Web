<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string $tab_1_title
 * @property string $tab_1_content
 * @property string $tab_2_title
 * @property string $tab_2_content
 * @property string $tab_3_title
 * @property string|null $tab_3_content
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'tab_1_title', 'tab_1_content', 'tab_2_title', 'tab_2_content', 'tab_3_title'], 'required'],
            [['price'], 'integer'],
            [['tab_1_content', 'tab_2_content', 'tab_3_content'], 'string'],
            [['title', 'tab_1_title', 'tab_2_title', 'tab_3_title'], 'string', 'max' => 65],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'tab_1_title' => 'Tab 1 Title',
            'tab_1_content' => 'Tab 1 Content',
            'tab_2_title' => 'Tab 2 Title',
            'tab_2_content' => 'Tab 2 Content',
            'tab_3_title' => 'Tab 3 Title',
            'tab_3_content' => 'Tab 3 Content',
        ];
    }
}
