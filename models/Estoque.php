<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estoque".
 *
 * @property int $id_estoque
 * @property int $id_produto
 * @property int $quantidade
 * @property string $tipo
 * @property string $data_hora_operacao
 *
 * @property Produto $produto
 */
class Estoque extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'quantidade', 'tipo', 'data_hora_operacao'], 'required'],
            [['id_produto', 'quantidade'], 'integer'],
            [['tipo'], 'string'],
            [['data_hora_operacao'], 'safe'],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id_produto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estoque' => Yii::t('app', 'Id Estoque'),
            'id_produto' => Yii::t('app', 'Id Produto'),
            'quantidade' => Yii::t('app', 'Quantidade'),
            'tipo' => Yii::t('app', 'Tipo'),
            'data_hora_operacao' => Yii::t('app', 'Data Hora Operacao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id_produto' => 'id_produto']);
    }
}
