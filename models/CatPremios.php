<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_premios".
 *
 * @property string $id_premio
 * @property string $id_evento
 * @property string $txt_nombre
 * @property string $num_otorga
 * @property string $num_limite
 *
 * @property EntEventos $idEvento
 */
class CatPremios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_premios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_evento'], 'required'],
            [['id_evento', 'num_otorga', 'num_limite'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 100],
            [['id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => EntEventos::className(), 'targetAttribute' => ['id_evento' => 'id_evento']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(EntEventos::className(), ['id_evento' => 'id_evento']);
    }
}
