<?php

namespace models\factories;

use models\User;

class UserFactory
{
    /**
     * @param array $data
     * @return User|null|string
     */
    public function buildUserById(array $data)
    {
        if (empty($data)) {
            return null;
        }

        $user = new User();

        if (!empty($data['id'])) {
            $user->setId($data['id']);
        } else {
            return 'userId not defined';
        }

        if (!empty($data['id'])) {
            $user->setId($data['name']);
        }

        if (!empty($data['id'])) {
            $user->setId($data['email']);
        }

        return $user;
    }
}