<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Imagenes;

/**
 * common\models\ImagenesSearch represents the model behind the search form about `common\models\Imagenes`.
 */
 class ImagenesSearch extends Imagenes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'evaluador_id', 'publica'], 'integer'],
            [['filename', 'bin', 'descripcion'], 'safe'],
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
        $query = Imagenes::find();

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
            'id' => $this->id,
            'evaluador_id' => $this->evaluador_id,
            'publica' => $this->publica,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'bin', $this->bin])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
