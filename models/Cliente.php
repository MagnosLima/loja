<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id_user
 * @property bigint $cpf_cliente
 * @property string $nome_completo
 * @property string $email
 * @property string $data_hora_cadastro
 *
 * @property User $user
 * @property Endereco $endereco
 * @property Telefone $telefone
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'cpf_cliente', 'nome_completo', 'email', 'data_hora_cadastro'], 'required'],
            [['id_user', 'cpf_cliente'], 'integer'],
            [['data_hora_cadastro'], 'safe'],
            [['nome_completo'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 45],
            [['cpf_cliente'], 'unique'],
            [['id_user'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'cpf_cliente' => Yii::t('app', 'Cpf Cliente'),
            'nome_completo' => Yii::t('app', 'Nome Completo'),
            'email' => Yii::t('app', 'Email'),
            'data_hora_cadastro' => Yii::t('app', 'Data Hora Cadastro'),
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
    public function getEndereco()
    {
        return $this->hasOne(Endereco::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefone()
    {
        return $this->hasOne(Telefone::className(), ['id_user' => 'id_user']);
    }
}
