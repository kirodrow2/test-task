<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parse;

/**
 * Search represents the model behind the search form of `app\models\Parse`.
 */
class Search extends Parse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'content',  'searchTitle','price', 'phone','price_start','price_end'], 'safe'],
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
    public function search($params, $post = null)
    {

        $query = Parse::find();


        if(!empty($post['price_start']) /*&& $post['price_end']== ' '*/ && $post != null){
        $query->where(['>', 'summ', $post['price_start']]);
    }
        if(!empty($post['price_end']) && $post != null){
            $query->where(['<', 'summ', $post['price_end']]);
        }
        if(!empty($post['searchTitle']) && $post != null){
            $query->where(['like', 'title', $post['searchTitle']]);
        }
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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'phone', $this->phone]);
       /* ->andFilterWhere(['>', 'price_start', $this->price_start])
            ->andFilterWhere(['<', 'price_end', $this->price_end]);*/

        return $dataProvider;
    }
}
