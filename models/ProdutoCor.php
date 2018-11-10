<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto_cor".
 *
 * @property int $id_produto
 * @property int $id_cor
 *
 * @property Cor $cor
 * @property Produto $produto
 */
class ProdutoCor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto_cor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'id_cor'], 'required'],
            [['id_produto', 'id_cor'], 'integer'],
            [['id_produto', 'id_cor'], 'unique', 'targetAttribute' => ['id_produto', 'id_cor']],
            [['id_cor'], 'exist', 'skipOnError' => true, 'targetClass' => Cor::className(), 'targetAttribute' => ['id_cor' => 'id_cor']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id_produto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produto' => Yii::t('app', 'Id Produto'),
            'id_cor' => Yii::t('app', 'Id Cor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCor()
    {
        return $this->hasOne(Cor::className(), ['id_cor' => 'id_cor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id_produto' => 'id_produto']);
    }
}
