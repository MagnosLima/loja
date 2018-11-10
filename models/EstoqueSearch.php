<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estoque;

/**
 * EstoqueSearch represents the model behind the search form of `app\models\Estoque`.
 */
class EstoqueSearch extends Estoque
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estoque', 'id_produto', 'quantidade', 'quantidade_total'], 'integer'],
            [['tipo', 'data_hora_operacao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Estoque::find();

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
            'id_estoque' => $this->id_estoque,
            'id_produto' => $this->id_produto,
            'quantidade' => $this->quantidade,
            'quantidade_total' => $this->quantidade_total,
            'data_hora_operacao' => $this->data_hora_operacao,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
