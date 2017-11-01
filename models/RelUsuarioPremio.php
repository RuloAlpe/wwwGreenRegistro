<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_usuario_premio".
 *
 * @property string $id_usuario
 * @property string $id_premio
 * @property string $txt_token
 *
 * @property CatPremios $idPremio
 * @property EntUsuarios $idUsuario
 */
class RelUsuarioPremio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_usuario_premio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_premio', 'txt_token'], 'required'],
            [['id_usuario', 'id_premio'], 'integer'],
            [['txt_token'], 'string', 'max' => 100],
            [['txt_token'], 'unique'],
            [['id_premio'], 'exist', 'skipOnError' => true, 'targetClass' => CatPremios::className(), 'targetAttribute' => ['id_premio' => 'id_premio']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_premio' => 'Id Premio',
            'txt_token' => 'Txt Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPremio()
    {
        return $this->hasOne(CatPremios::className(), ['id_premio' => 'id_premio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(EntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }
}
