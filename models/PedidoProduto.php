<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido_produto".
 *
 * @property int $id_pedido
 * @property int $id_produto
 * @property double $preco_unitario
 * @property int $quantidade
 * @property double $subtotal
 *
 * @property Pedido $pedido
 * @property Produto $produto
 */
class PedidoProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedido', 'id_produto', 'preco_unitario', 'quantidade', 'subtotal'], 'required'],
            [['id_pedido', 'id_produto', 'quantidade'], 'integer'],
            [['preco_unitario', 'subtotal'], 'number'],
            [['id_pedido', 'id_produto'], 'unique', 'targetAttribute' => ['id_pedido', 'id_produto']],
            [['id_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['id_pedido' => 'id_pedido']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id_produto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'id_produto' => Yii::t('app', 'Id Produto'),
            'preco_unitario' => Yii::t('app', 'Preco Unitario'),
            'quantidade' => Yii::t('app', 'Quantidade'),
            'subtotal' => Yii::t('app', 'Subtotal'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id_pedido' => 'id_pedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id_produto' => 'id_produto']);
    }
}
