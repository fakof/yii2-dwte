<?php

namespace fakof\dwte\queries;

/**
 * This is the ActiveQuery class for [[fakof\dwte\models\Video]].
 *
 * @see fakof\dwte\models\Video
 */
class VideosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return fakof\dwte\models\Video[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return fakof\dwte\models\Video|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
