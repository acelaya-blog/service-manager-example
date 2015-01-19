<?php
namespace Acelaya\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

abstract class AbstractService
{
    /**
     * @var ObjectManager
     */
    protected $objectmanager;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(ObjectManager $objectManager, LoggerInterface $logger)
    {
        $this->objectmanager = $objectManager;
        $this->logger = $logger;
    }
}
