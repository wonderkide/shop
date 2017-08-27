<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_product_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property integer $parent
 * @property string $setting
 * @property integer $sort
 * @property integer $on_menu
 * @property integer $active
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail', 'parent', 'sort', 'on_menu', 'active'], 'required'],
            [['parent', 'sort', 'on_menu', 'active'], 'integer'],
            [['setting'], 'string'],
            [['name'], 'string', 'max' => 256],
            [['detail'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'detail' => 'Detail',
            'parent' => 'Parent',
            'setting' => 'Setting',
            'sort' => 'Sort',
            'on_menu' => 'On Menu',
            'active' => 'Active',
        ];
    }
}
