<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefone".
 *
 * @property int $id_user
 * @property string $numero_principal
 * @property string $numero_alt
 *
 * @property Cliente $user
 */
class Telefone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'numero_principal'], 'required'],
            [['id_user'], 'integer'],
            [['numero_principal', 'numero_alt'], 'string', 'max' => 15],
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
            'numero_principal' => Yii::t('app', 'Main Number'),
            'numero_alt' => Yii::t('app', 'Alternative Number'),
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
