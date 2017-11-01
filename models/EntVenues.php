<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_venues".
 *
 * @property string $id_venue
 * @property string $txt_nombre
 * @property string $txt_direccion
 * @property string $b_habilitado
 *
 * @property EntEventos[] $entEventos
 */
class EntVenues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_venues';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre'], 'required'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre', 'txt_direccion'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_venue' => 'Id Venue',
            'txt_nombre' => 'Txt Nombre',
            'txt_direccion' => 'Txt Direccion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntEventos()
    {
        return $this->hasMany(EntEventos::className(), ['id_venue' => 'id_venue']);
    }
}
