<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_eventos".
 *
 * @property string $id_evento
 * @property string $id_venue
 * @property string $txt_nombre
 * @property string $txt_token
 * @property string $txt_descripcion
 * @property string $txt_url_imagen
 * @property string $fch_evento
 * @property string $b_habilitado
 *
 * @property CatPremios[] $catPremios
 * @property EntVenues $idVenue
 * @property EntUsuarios[] $entUsuarios
 */
class EntEventos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_eventos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_venue', 'txt_nombre', 'txt_token'], 'required'],
            [['id_venue', 'b_habilitado'], 'integer'],
            [['fch_evento'], 'safe'],
            [['txt_nombre', 'txt_token', 'txt_descripcion'], 'string', 'max' => 200],
            [['txt_url_imagen'], 'string', 'max' => 500],
            [['id_venue'], 'exist', 'skipOnError' => true, 'targetClass' => EntVenues::className(), 'targetAttribute' => ['id_venue' => 'id_venue']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_evento' => 'Id Evento',
            'id_venue' => 'Id Venue',
            'txt_nombre' => 'Txt Nombre',
            'txt_token' => 'Txt Token',
            'txt_descripcion' => 'Txt Descripcion',
            'txt_url_imagen' => 'Txt Url Imagen',
            'fch_evento' => 'Fch Evento',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatPremios()
    {
        return $this->hasMany(CatPremios::className(), ['id_evento' => 'id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVenue()
    {
        return $this->hasOne(EntVenues::className(), ['id_venue' => 'id_venue']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntUsuarios()
    {
        return $this->hasMany(EntUsuarios::className(), ['id_evento' => 'id_evento']);
    }
}
