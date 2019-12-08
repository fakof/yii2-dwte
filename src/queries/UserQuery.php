<?php

namespace fakof\dwte\queries;

use fakof\dwte\models\User;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[fakof\dwte\models\User]].
 *
 * @see \fakof\dwte\models\User
 */
class UserQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
