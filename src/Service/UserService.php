<?php
namespace Acelaya\Service;

use Acelaya\Entity\User;

class UserService extends AbstractService implements UserServiceInterface
{
    /**
     * @return User[]
     */
    public function getUsers()
    {
        $this->logger->info('Fetching users...');
        $users = $this->objectmanager->getRepository(User::class)->findAll();
        $this->logger->debug(sprintf('Found %s users', count($users)));
        return $users;
    }

    /**
     * @param $userId
     * @return User
     */
    public function getUser($userId)
    {
        $this->logger->info(sprintf('Fetching user with id %s...', $userId));
        $user = $this->objectmanager->find(User::class, $userId);
        $this->logger->debug(empty($user) ? 'User not found' : 'User found');
        return $user;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function createUser(User $user)
    {
        $this->logger->info('Creating new user...');
        $this->objectmanager->persist($user);
        $this->objectmanager->flush();
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function updateUser(User $user)
    {
        $this->logger->info(sprintf('Updating user with id %s...', $user->getId()));
        $this->objectmanager->persist($user);
        $this->objectmanager->flush();
    }

    /**
     * @param User|int $user
     * @return mixed
     */
    public function deleteUser($user)
    {
        if (! $user instanceof User) {
            $user = $this->getUser($user);
        }
        $this->logger->info(sprintf('Deleting user with id %s...', $user->getId()));
        $this->objectmanager->remove($user);
        $this->objectmanager->flush();
    }
}
