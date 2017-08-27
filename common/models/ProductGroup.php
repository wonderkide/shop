<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_product_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property string $data_append
 * @property integer $active
 */
class ProductGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_product_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail', 'active'], 'required'],
            [['data_append'], 'string'],
            [['active'], 'integer'],
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
            'data_append' => 'Data Append',
            'active' => 'Active',
        ];
    }
}
