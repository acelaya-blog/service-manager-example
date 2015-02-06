<?php
namespace Acelaya\Test\Service;

use Acelaya\Entity\User;
use Acelaya\Service\Logger;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use League\Flysystem\Adapter\NullAdapter;
use League\Flysystem\Filesystem;
use \PHPUnit_Framework_TestCase as TestCase;
use Acelaya\Service\UserService;

class UserServiceTest extends TestCase
{
    /**
     * @var UserService
     */
    protected $userService;

    public function setUp()
    {
        $repository = $this->getMock(ObjectRepository::class);
        $repository->expects($this->any())
                   ->method('findAll')
                   ->willReturn([]);

        $objectManager = $this->getMock(ObjectManager::class);
        $objectManager->expects($this->any())
                      ->method('getRepository')
                      ->willReturn($repository);
        $objectManager->expects($this->any())
                      ->method('persist')
                      ->willReturn(null);
        $objectManager->expects($this->any())
                      ->method('flush')
                      ->willReturn(null);
        $objectManager->expects($this->any())
                      ->method('find')
                      ->willReturn(new User());

        $this->userService = new UserService(
            $objectManager,
            new Logger(new Filesystem(new NullAdapter()), 'fake.log')
        );
    }

    public function testGetUsers()
    {
        $this->assertCount(0, $this->userService->getUsers());
    }

    public function testgetUser()
    {
        $this->assertInstanceOf(User::class, $this->userService->getUser(5));
    }
}
