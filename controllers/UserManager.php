<?php

namespace controllers;

use models\User;
use models\factories\UserFactory;

class UserManager
{
    /** @var UserFactory */
    private $factory;

    private static $users = [
        '0' => [
            'id' => '0',
            'name' => 'foo',
            'email' => 'baz',
            'password' => 'bar',
        ],
        '1' => [
            'id' => '1',
            'name' => 'baz',
            'email' => 'foo',
            'password' => 'bar',
        ],
        '2' => [
            'id' => '2',
            'name' => 'bar',
            'email' => 'baz',
            'password' => 'foo',
        ],
        '3' => [
            'id' => '3',
            'name' => 'foo',
            'email' => 'bar',
            'password' => 'baz',
        ],
        '4' => [
            'id' => '4',
            'name' => 'baz',
            'email' => 'bar',
            'password' => 'foo',
        ],
    ];

    public function __construct(UserFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param $id
     * @return User|null|string
     */
    public function getUserById($id)
    {
        $data = [];

        foreach (self::$users as $userData) {
            if ((int)$userData['id'] === (int)$id) {
                $data = $userData;
            }
        }

        return $this->factory->buildUserById($data);
    }

    /**
     * @return array[User]
     */
    public function getUsersList()
    {
        $users = [];
        foreach (self::$users as $userData) {
            $user = $this->factory->buildUserById($userData);
            $users[] = $user;
        }

        return $users;
    }
}