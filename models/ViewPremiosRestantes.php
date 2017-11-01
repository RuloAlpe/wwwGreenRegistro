<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_premios_restantes".
 *
 * @property string $id_premio
 * @property string $txt_nombre
 * @property string $txt_imagen
 * @property integer $num_otorga
 * @property integer $num_limite
 * @property integer $num_limite_dia
 * @property string $num_premios_restantes_dia
 * @property string $num_premios_restantes
 * @property string $num_premios_dados_dia
 * @property string $num_premios_dados
 * @property integer $b_habilitado
 */
class ViewPremiosRestantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_premios_restantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_premio', 'num_otorga', 'num_limite', 'num_limite_dia', 'num_premios_restantes_dia', 'num_premios_restantes', 'num_premios_dados_dia', 'num_premios_dados', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 500],
            [['txt_imagen'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_premio' => 'Id Premio',
            'txt_nombre' => 'Txt Nombre',
            'txt_imagen' => 'Txt Imagen',
            'num_otorga' => 'Num Otorga',
            'num_limite' => 'Num Limite',
            'num_limite_dia' => 'Num Limite Dia',
            'num_premios_restantes_dia' => 'Num Premios Restantes Dia',
            'num_premios_restantes' => 'Num Premios Restantes',
            'num_premios_dados_dia' => 'Num Premios Dados Dia',
            'num_premios_dados' => 'Num Premios Dados',
            'b_habilitado' => 'B Habilitado',
        ];
    }
}
