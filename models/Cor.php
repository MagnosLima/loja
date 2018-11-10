<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cor".
 *
 * @property int $id_cor
 * @property string $nome
 *
 * @property ProdutoCor[] $produtoCors
 * @property Produto[] $produtos
 */
class Cor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cor';
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
            'id_cor' => Yii::t('app', 'Id Cor'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoCors()
    {
        return $this->hasMany(ProdutoCor::className(), ['id_cor' => 'id_cor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_produto' => 'id_produto'])->viaTable('produto_cor', ['id_cor' => 'id_cor']);
    }
}
