<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 * @property string $type
 *
 * @property Cliente $cliente
 * @property Pedido[] $pedidos
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public function beforeSave( $insert )
    {
        //Ação disparada no insert ou update.
        //Fazer a mágica aqui - atributos sujos (valores alterados).
        Yii::trace("Antes de criptografar");
        if (array_key_exists('password', $this->dirtyAttributes)) {
            $this->password = Yii:: $app->getSecurity()->generatePasswordHash($this->password);
            Yii::trace("Depois de criptografar");
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['type'], 'string'],
            [['username'], 'string', 'max' => 45],
            [['password', 'access_token', 'auth_key'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'access_token' => Yii::t('app', 'Access Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_user' => 'id_user']);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['username'=>$id]);
    }

    //RBCA
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->username;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
