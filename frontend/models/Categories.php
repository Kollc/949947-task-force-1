<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name_category
 * @property string $en_name
 */
class Categories extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_category', 'en_name'], 'required'],
            [['name_category', 'en_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_category' => 'Name Category',
            'en_name' => 'En Name',
        ];
    }

    /**
     * @return array|false
     */
    public static function getCategoriesList(): array
    {
        $categories = self::find()->all();

        if (!$categories) {
            return [];
        }

        return array_combine(array_column($categories, 'en_name'), array_column($categories, 'name_category'));
    }
}
