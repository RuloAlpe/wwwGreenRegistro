<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_usuario_datos".
 *
 * @property string $txt_nombre_completo
 * @property string $txt_telefono_celular
 * @property string $txt_cp
 * @property string $num_edad
 * @property string $fch_registro
 * @property string $acepto_terminos
 * @property string $txt_premio
 */
class ViewUsuarioDatos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_usuario_datos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre_completo', 'txt_telefono_celular', 'num_edad'], 'required'],
            [['num_edad'], 'integer'],
            [['fch_registro'], 'safe'],
            [['txt_nombre_completo'], 'string', 'max' => 150],
            [['txt_telefono_celular'], 'string', 'max' => 10],
            [['txt_cp'], 'string', 'max' => 5],
            [['acepto_terminos'], 'string', 'max' => 29],
            [['txt_premio'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'txt_nombre_completo' => 'Txt Nombre Completo',
            'txt_telefono_celular' => 'Txt Telefono Celular',
            'txt_cp' => 'Txt Cp',
            'num_edad' => 'Num Edad',
            'fch_registro' => 'Fch Registro',
            'acepto_terminos' => 'Acepto Terminos',
            'txt_premio' => 'Txt Premio',
        ];
    }
}
