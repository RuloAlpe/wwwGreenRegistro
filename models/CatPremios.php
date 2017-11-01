<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_premios".
 *
 * @property string $id_premio
 * @property string $txt_nombre
 * @property string $txt_imagen
 * @property integer $num_otorga
 * @property integer $num_limite
 * @property integer $num_limite_dia
 * @property integer $b_habilitado
 *
 * @property RelUsuarioPremio[] $relUsuarioPremios
 * @property EntUsuarios[] $idUsuarios
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
            [['num_otorga', 'num_limite', 'num_limite_dia', 'b_habilitado'], 'integer'],
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
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelUsuarioPremios()
    {
        return $this->hasMany(RelUsuarioPremio::className(), ['id_premio' => 'id_premio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarios()
    {
        return $this->hasMany(EntUsuarios::className(), ['id_usuario' => 'id_usuario'])->viaTable('rel_usuario_premio', ['id_premio' => 'id_premio']);
    }
}
