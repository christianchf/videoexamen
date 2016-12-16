<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class FichaForm extends Model
{
    public $ficha_id;
    public $persona_id;
    public function rules()
    {
        return [
            [['ficha_id', 'persona_id'], 'number'],
            [['persona_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Persona::className(),
                'targetAttribute' => ['persona_id' => 'id'],
            ],
            [['ficha_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Ficha::className(),
                'targetAttribute' => ['ficha_id' => 'id'],
            ],
        ];
    }
    public function attributeLabels()
    {
        return [
            'ficha_id' => 'Titulo de la película',
            'persona_id' => 'Nombre del actor/actriz',
        ];
    }
    public function formName()
    {
        return '';
    }
}
