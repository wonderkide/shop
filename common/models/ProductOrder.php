<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_product_order".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $address
 * @property double $price
 * @property double $discount
 * @property double $total
 * @property integer $quantity
 * @property string $description
 * @property string $create_at
 * @property string $create_ip
 * @property integer $status
 */
class ProductOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_product_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'address', 'price', 'discount', 'total', 'quantity', 'description', 'create_at', 'create_ip', 'status'], 'required'],
            [['id_user', 'address', 'quantity', 'status'], 'integer'],
            [['price', 'discount', 'total'], 'number'],
            [['description'], 'string'],
            [['create_at'], 'safe'],
            [['create_ip'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'address' => 'Address',
            'price' => 'Price',
            'discount' => 'Discount',
            'total' => 'Total',
            'quantity' => 'Quantity',
            'description' => 'Description',
            'create_at' => 'Create At',
            'create_ip' => 'Create Ip',
            'status' => 'Status',
        ];
    }
}
