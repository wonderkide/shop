<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserAddress;

/**
 * UserAddressSearch represents the model behind the search form about `common\models\UserAddress`.
 */
class UserAddressSearch extends UserAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['number', 'building', 'soi', 'road', 'mu', 'district', 'amphoe', 'province', 'zipcode', 'note'], 'safe'],
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
        $query = UserAddress::find();

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
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'building', $this->building])
            ->andFilterWhere(['like', 'soi', $this->soi])
            ->andFilterWhere(['like', 'road', $this->road])
            ->andFilterWhere(['like', 'mu', $this->mu])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'amphoe', $this->amphoe])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
