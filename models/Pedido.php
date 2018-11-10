<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id_pedido
 * @property int $id_user
 * @property string $data_hora_pedido
 * @property double $total
 *
 * @property User $user
 * @property PedidoProduto[] $pedidoProdutos
 * @property Produto[] $produtos
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'data_hora_pedido', 'total'], 'required'],
            [['id_user'], 'integer'],
            [['data_hora_pedido'], 'safe'],
            [['total'], 'number'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => Yii::t('app', 'Id Pedido'),
            'id_user' => Yii::t('app', 'Id User'),
            'data_hora_pedido' => Yii::t('app', 'Data Hora Pedido'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['id_pedido' => 'id_pedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_produto' => 'id_produto'])->viaTable('pedido_produto', ['id_pedido' => 'id_pedido']);
    }
}
