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

    public function createAction()
    {
        if ($this->request->isPost()) {
            $user = new User();
            $user->exchangeArray($this->request->post('user'));
            $this->userService->createUser($user);
            $this->response->redirect('/users/list');
            return;
        }

        $this->renderer->display('users_create.phtml');
    }

    public function updateAction($userId)
    {
        $user = $this->userService->getUser($userId);

        if ($this->request->isPost()) {
            $user->exchangeArray($this->request->post('user'));
            $this->userService->updateUser($user);
            $this->response->redirect('/users/list');
            return;
        }

        $this->renderer->display('users_create.phtml', [
            'user' => $user
        ]);
    }

    public function deleteAction($userId)
    {
        $user = $this->userService->getUser($userId);

        if ($this->request->isPost()) {
            $this->userService->deleteUser($user);
            $this->response->redirect('/users/list');
            return;
        }

        $this->renderer->display('users_delete.phtml', [
            'user' => $user
        ]);
    }
}
