<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductOrder;

/**
 * ProductOrderSearch represents the model behind the search form about `common\models\ProductOrder`.
 */
class ProductOrderSearch extends ProductOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'address', 'quantity', 'status'], 'integer'],
            [['price', 'discount', 'total'], 'number'],
            [['description', 'create_at', 'create_ip'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductOrder::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'address' => $this->address,
            'price' => $this->price,
            'discount' => $this->discount,
            'total' => $this->total,
            'quantity' => $this->quantity,
            'create_at' => $this->create_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'create_ip', $this->create_ip]);

        return $dataProvider;
    }
}
