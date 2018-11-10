<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id_produto
 * @property int $id_categoria
 * @property string $nome
 * @property string $descricao
 * @property double $preco
 *
 * @property Estoque[] $estoques
 * @property ImagensProduto $imagensProduto
 * @property PedidoProduto[] $pedidoProdutos
 * @property Pedido[] $pedidos
 * @property Categoria $categoria
 * @property ProdutoCor[] $produtoCors
 * @property Cor[] $cors
 * @property ProdutoTamanho[] $produtoTamanhos
 * @property Tamanho[] $tamanhos
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria', 'nome', 'descricao', 'preco'], 'required'],
            [['id_categoria'], 'integer'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 45],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produto' => Yii::t('app', 'Id Produto'),
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descricao'),
            'preco' => Yii::t('app', 'Preco'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstoques()
    {
        return $this->hasMany(Estoque::className(), ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagensProduto()
    {
        return $this->hasOne(ImagensProduto::className(), ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_pedido' => 'id_pedido'])->viaTable('pedido_produto', ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoCors()
    {
        return $this->hasMany(ProdutoCor::className(), ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCors()
    {
        return $this->hasMany(Cor::className(), ['id_cor' => 'id_cor'])->viaTable('produto_cor', ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoTamanhos()
    {
        return $this->hasMany(ProdutoTamanho::className(), ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamanhos()
    {
        return $this->hasMany(Tamanho::className(), ['id_tamanho' => 'id_tamanho'])->viaTable('produto_tamanho', ['id_produto' => 'id_produto']);
    }
}
