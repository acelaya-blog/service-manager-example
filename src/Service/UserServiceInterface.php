<?php
namespace Acelaya\Service;

use Acelaya\Entity\User;

interface UserServiceInterface
{
    /**
     * @return User[]
     */
    public function getUsers();

    /**
     * @param $userId
     * @return User
     */
    public function getUser($userId);

    /**
     * @param User $user
     * @return mixed
     */
    public function createUser(User $user);

    /**
     * @param User $user
     * @return mixed
     */
    public function updateUser(User $user);

    /**
     * @param User|int $user
     * @return mixed
     */
    public function deleteUser($user);
}
