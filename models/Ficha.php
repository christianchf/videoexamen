<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fichas".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $anyo
 * @property integer $duracion
 * @property integer $director_id
 *
 * @property Personas $director
 * @property Reparto[] $repartos
 * @property Personas[] $personas
 */
class Ficha extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fichas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'titulo', 'director_id'], 'required'],
            [['id', 'duracion', 'director_id'], 'integer'],
            [['anyo'], 'number'],
            [['titulo'], 'string', 'max' => 50],
            [['director_id'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['director_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'anyo' => 'Anyo',
            'duracion' => 'Duracion',
            'director_id' => 'Director ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(Persona::className(), ['id' => 'director_id'])->inverseOf('fichas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos()
    {
        return $this->hasMany(Reparto::className(), ['ficha_id' => 'id'])->inverseOf('ficha');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id' => 'persona_id'])->viaTable('reparto', ['ficha_id' => 'id']);
    }
}
