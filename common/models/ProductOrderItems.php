<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_product_order_items".
 *
 * @property integer $id
 * @property integer $id_product
 * @property integer $id_product_order
 * @property string $name
 * @property string $color
 * @property string $size
 * @property integer $quantity
 */
class ProductOrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_product_order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'id_product_order', 'name', 'color', 'size', 'quantity'], 'required'],
            [['id_product', 'id_product_order', 'quantity'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['color', 'size'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'id_product_order' => 'Id Product Order',
            'name' => 'Name',
            'color' => 'Color',
            'size' => 'Size',
            'quantity' => 'Quantity',
        ];
    }
}
