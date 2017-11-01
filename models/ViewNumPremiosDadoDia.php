<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_num_premios_dado_dia".
 *
 * @property string $id_premio
 * @property string $num_premios_dados
 * @property string $fch_premio
 */
class ViewNumPremiosDadoDia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_num_premios_dado_dia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_premio'], 'required'],
            [['id_premio', 'num_premios_dados'], 'integer'],
            [['fch_premio'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_premio' => 'Id Premio',
            'num_premios_dados' => 'Num Premios Dados',
            'fch_premio' => 'Fch Premio',
        ];
    }
}
