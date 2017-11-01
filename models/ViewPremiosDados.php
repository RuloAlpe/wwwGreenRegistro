<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_premios_dados".
 *
 * @property string $id_premio
 * @property string $num_premios_dados
 */
class ViewPremiosDados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_premios_dados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_premio'], 'required'],
            [['id_premio', 'num_premios_dados'], 'integer'],
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
        ];
    }
}
