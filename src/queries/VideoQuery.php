<?php

namespace fakof\dwte\queries;

use fakof\dwte\models\Video;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[fakof\dwte\models\Video]].
 *
 * @see \fakof\dwte\models\Video
 */
class VideoQuery extends ActiveQuery
{
    public function moderated()
    {
        return $this->andWhere('[[is_moderated]]=1');
    }

    /**
     * {@inheritdoc}
     * @return Video[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Video|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
