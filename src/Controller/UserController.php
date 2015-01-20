<?php
namespace Acelaya\Controller;

use Acelaya\Entity\User;
use Acelaya\Mvc\AbstractController;
use Acelaya\Service\UserServiceInterface;

/**
 * Class UserController
 * @author
 * @link
 */
class UserController extends AbstractController
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function listAction()
    {
        $this->renderer->display('users_list.phtml', ['users' => $this->userService->getUsers()]);
    }

    public function createAction(User $user)
    {

    }

    public function updateAction(User $user)
    {

    }

    public function deleteAction(User $user)
    {

    }
}
