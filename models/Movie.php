<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Movie".
 *
 * @property string $movie_name
 * @property string $movie_logo
 * @property string $movie_runningtime
 * @property integer $movie_year
 * @property string $movie_director
 * @property string $movie_actors
 * @property string $movie_genre
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;
    public static function tableName()
    {
        return 'Movie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movie_name', 'movie_runningtime', 'movie_year', 'movie_director', 'movie_genre'], 'required'],
            [['movie_year'], 'integer'],
            [['movie_name', 'movie_director', 'movie_genre'], 'string', 'max' => 50],
            [['file'],'file'],
            [['movie_runningtime'], 'string', 'max' => 10],
            [['movie_actors', 'movie_logo'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'movie_name' => 'Movie Name',
            'file' => 'Movie Logo',
            'movie_runningtime' => 'Movie Runningtime',
            'movie_year' => 'Movie Year',
            'movie_director' => 'Movie Director',
            'movie_actors' => 'Movie Actors',
            'movie_genre' => 'Movie Genre',
        ];
    }
}
