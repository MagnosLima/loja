<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagens_produto".
 *
 * @property int $id_produto
 * @property string $caminho_imagem
 *
 * @property Produto $produto
 */
class ImagensProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagens_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'caminho_imagem'], 'required'],
            [['id_produto'], 'integer'],
            [['caminho_imagem'], 'string', 'max' => 100],
            [['id_produto'], 'unique'],
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
            'caminho_imagem' => Yii::t('app', 'Caminho Imagem'),
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
