<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios".
 *
 * @property string $id_usuario
 * @property string $txt_nombre_completo
 * @property string $txt_telefono_celular
 * @property string $txt_cp
 * @property string $txt_email
 * @property string $num_edad
 * @property string $num_patos
 * @property string $fch_registro
 *
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
            [[ 'txt_nombre_completo', 'txt_telefono_celular', 'num_edad', 'txt_restaurante'], 'required', 'message'=>'Campo requerido'],
            [[ 'num_edad'], 'integer', 'message'=>'El campo debe ser numerico'],
            [['fch_registro'], 'safe'],
            [['txt_nombre_completo'], 'string', 'max' => 150],
            [['txt_telefono_celular'], 'string', 'max' => 10, 'min' => 10, 'tooLong' => 'El campo no debe superar 10 dígitos','tooShort' => 'El campo debe ser mínimo de 10 digítos'],
            [['txt_cp'], 'string', 'max' => 5, 'min'=>5,'tooLong' => 'El campo no debe superar 5 dígitos','tooShort' => 'El campo debe ser mínimo de 5 digítos'],
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
            'txt_nombre_completo' => 'Nombre',
            'txt_telefono_celular' => 'Teléfono',
            'txt_cp' => 'C.P.',
            'txt_email' => 'Txt Email',
            'num_edad' => 'Edad',
            'fch_registro' => 'Fch Registro',
        ];
    }

}
