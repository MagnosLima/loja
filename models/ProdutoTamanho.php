<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto_tamanho".
 *
 * @property int $id_produto
 * @property int $id_tamanho
 *
 * @property Produto $produto
 * @property Tamanho $tamanho
 */
class ProdutoTamanho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto_tamanho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'id_tamanho'], 'required'],
            [['id_produto', 'id_tamanho'], 'integer'],
            [['id_produto', 'id_tamanho'], 'unique', 'targetAttribute' => ['id_produto', 'id_tamanho']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id_produto']],
            [['id_tamanho'], 'exist', 'skipOnError' => true, 'targetClass' => Tamanho::className(), 'targetAttribute' => ['id_tamanho' => 'id_tamanho']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produto' => Yii::t('app', 'Id Produto'),
            'id_tamanho' => Yii::t('app', 'Id Tamanho'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id_produto' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamanho()
    {
        return $this->hasOne(Tamanho::className(), ['id_tamanho' => 'id_tamanho']);
    }
}
