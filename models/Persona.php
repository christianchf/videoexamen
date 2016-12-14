<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Fichas[] $fichas
 * @property Reparto[] $repartos
 * @property Fichas[] $fichas0
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre'], 'required'],
            [['id'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichas()
    {
        return $this->hasMany(Ficha::className(), ['director_id' => 'id'])->inverseOf('director');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos()
    {
        return $this->hasMany(Reparto::className(), ['persona_id' => 'id'])->inverseOf('persona');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichas0()
    {
        return $this->hasMany(Ficha::className(), ['id' => 'ficha_id'])->viaTable('reparto', ['persona_id' => 'id']);
    }
}
