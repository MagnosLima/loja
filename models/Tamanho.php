<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tamanho".
 *
 * @property int $id_tamanho
 * @property string $nome
 *
 * @property ProdutoTamanho[] $produtoTamanhos
 * @property Produto[] $produtos
 */
class Tamanho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tamanho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tamanho' => Yii::t('app', 'Id Tamanho'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoTamanhos()
    {
        return $this->hasMany(ProdutoTamanho::className(), ['id_tamanho' => 'id_tamanho']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_produto' => 'id_produto'])->viaTable('produto_tamanho', ['id_tamanho' => 'id_tamanho']);
    }
}
