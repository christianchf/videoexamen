<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ficha;

/**
 * FichaSearch represents the model behind the search form about `app\models\Ficha`.
 */
class FichaSearch extends Ficha
{
    public $director;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duracion'], 'integer'],
            [['titulo', 'director'], 'safe'],
            [['anyo'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ficha::find()->joinWith('director');

        // add conditions that should always apply here
        $this->load($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['director'] = [
           // The tables are the ones our relation are configured to
           // in my case they are prefixed with "tbl_"
           'asc' => ['personas.nombre' => SORT_ASC],
           'desc' => ['personas.nombre' => SORT_DESC],
        ];

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'anyo' => $this->anyo,
            'duracion' => $this->duracion,
            //'director' => $this->director_id,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
              ->andFilterWhere(['like', 'personas.nombre', $this->director]);

        return $dataProvider;
    }
}
