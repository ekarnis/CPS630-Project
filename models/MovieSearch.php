<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movie;

/**
 * MovieSearch represents the model behind the search form about `app\models\Movie`.
 */
class MovieSearch extends Movie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movie_name', 'movie_logo', 'movie_runningtime', 'movie_director', 'movie_actors', 'movie_genre'], 'safe'],
            [['movie_year'], 'integer'],
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
        $query = Movie::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'movie_year' => $this->movie_year,
        ]);

        $query->andFilterWhere(['like', 'movie_name', $this->movie_name])
            ->andFilterWhere(['like', 'movie_logo', $this->movie_logo])
            ->andFilterWhere(['like', 'movie_runningtime', $this->movie_runningtime])
            ->andFilterWhere(['like', 'movie_director', $this->movie_director])
            ->andFilterWhere(['like', 'movie_actors', $this->movie_actors])
            ->andFilterWhere(['like', 'movie_genre', $this->movie_genre]);

        return $dataProvider;
    }
}
