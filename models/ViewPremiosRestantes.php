<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_premios_restantes".
 *
 * @property string $id_premio
 * @property string $id_evento
 * @property string $txt_nombre
 * @property string $num_otorga
 * @property string $num_limite
 * @property string $num_premios_dados
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
            [['id_premio', 'id_evento', 'num_otorga', 'num_limite', 'num_premios_dados'], 'integer'],
            [['id_evento'], 'required'],
            [['txt_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_premio' => 'Id Premio',
            'id_evento' => 'Id Evento',
            'txt_nombre' => 'Txt Nombre',
            'num_otorga' => 'Num Otorga',
            'num_limite' => 'Num Limite',
            'num_premios_dados' => 'Num Premios Dados',
        ];
    }
}
