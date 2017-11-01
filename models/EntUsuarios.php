<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios".
 *
 * @property string $id_usuario
 * @property string $txt_nombre_completo
 * @property string $txt_token
 * @property string $txt_telefono_celular
 * @property string $txt_cp
 * @property string $txt_email
 * @property string $num_edad
 * @property string $fch_registro
 * @property string $b_aceptar_terminos
 *
 * @property RelUsuarioPremio[] $relUsuarioPremios
 * @property CatPremios[] $idPremios
 */
class EntUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre_completo', 'txt_token', 'txt_telefono_celular', 'txt_email', 'txt_cp'], 'required', 'message'=>'Campo requerido'],
            [['num_edad', 'b_aceptar_terminos'], 'integer'],
            [['fch_registro'], 'safe'],
            [['txt_nombre_completo', 'txt_token'], 'string', 'max' => 150],
            [['txt_telefono_celular'], 'string', 'max' => 10],
            [['txt_cp'], 'string', 'max' => 5],
            [['txt_telefono_celular'], 'string', 'max' => 10, 'min' => 10, 'tooLong' => 'El campo no debe superar 10 dígitos','tooShort' => 'El campo debe ser mínimo de 10 digítos'],
            [['txt_email'], 'email', 'message'=>'Formato de email no válido'],
            [['txt_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'txt_nombre_completo' => 'Txt Nombre Completo',
            'txt_token' => 'Txt Token',
            'txt_telefono_celular' => 'Txt Telefono Celular',
            'txt_cp' => 'Txt Cp',
            'txt_email' => 'Txt Email',
            'num_edad' => 'Num Edad',
            'fch_registro' => 'Fch Registro',
            'b_aceptar_terminos' => 'B Aceptar Terminos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelUsuarioPremios()
    {
        return $this->hasMany(RelUsuarioPremio::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPremios()
    {
        return $this->hasMany(CatPremios::className(), ['id_premio' => 'id_premio'])->viaTable('rel_usuario_premio', ['id_usuario' => 'id_usuario']);
    }
}
