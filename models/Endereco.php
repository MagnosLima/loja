<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property int $id_user
 * @property string $logradouro
 * @property string $numero
 * @property string $cep
 * @property string $municipio
 * @property string $estado
 *
 * @property Cliente $user
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'logradouro', 'numero', 'cep', 'municipio', 'estado'], 'required'],
            [['id_user'], 'integer'],
            [['logradouro', 'municipio', 'estado'], 'string', 'max' => 45],
            [['numero'], 'string', 'max' => 10],
            [['cep'], 'string', 'max' => 9],
            [['id_user'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'logradouro' => Yii::t('app', 'Logradouro'),
            'numero' => Yii::t('app', 'Numero'),
            'cep' => Yii::t('app', 'Cep'),
            'municipio' => Yii::t('app', 'Municipio'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Cliente::className(), ['id_user' => 'id_user']);
    }
}
