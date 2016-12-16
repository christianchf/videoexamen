<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reparto".
 *
 * @property integer $ficha_id
 * @property integer $persona_id
 *
 * @property Fichas $ficha
 * @property Personas $persona
 */
class Reparto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reparto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ficha_id', 'persona_id'], 'required'],
            [['ficha_id', 'persona_id'], 'integer'],
            [['ficha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ficha::className(), 'targetAttribute' => ['ficha_id' => 'id']],
            [['persona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['persona_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ficha_id' => 'Ficha ID',
            'persona_id' => 'Persona ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFicha()
    {
        return $this->hasOne(Ficha::className(), ['id' => 'ficha_id'])->inverseOf('repartos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id'])->inverseOf('repartos');
    }
}
