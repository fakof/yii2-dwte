<?php

namespace fakof\dwte\queries;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[fakof\dwte\models\User]].
 *
 * @see fakof\dwte\models\User
 */
class UsersQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return fakof\dwte\models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return fakof\dwte\models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
