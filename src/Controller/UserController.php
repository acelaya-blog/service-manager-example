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

    }

    public function listAction()
    {

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
