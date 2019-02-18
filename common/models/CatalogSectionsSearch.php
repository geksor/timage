<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatalogSections;

/**
 * CatalogSectionsSearch represents the model behind the search form of `common\models\CatalogSections`.
 */
class CatalogSectionsSearch extends CatalogSections
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'publish', 'rank', 'show_on_home'], 'integer'],
            [['title', 'short_desc', 'desc', 'main_image', 'second_image_1', 'second_image_2', 'alias', 'meta_title', 'meta_description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CatalogSections::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'publish' => $this->publish,
            'rank' => $this->rank,
            'show_on_home' => $this->show_on_home,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'short_desc', $this->short_desc])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'main_image', $this->main_image])
            ->andFilterWhere(['like', 'second_image_1', $this->second_image_1])
            ->andFilterWhere(['like', 'second_image_2', $this->second_image_2])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description]);

        return $dataProvider;
    }
}
