<?php
namespace Acelaya\Service;

use League\Flysystem\FilesystemInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * This logger does nothing
 *
 * Class Logger
 * @author
 * @link
 */
class Logger extends AbstractLogger
{
    /**
     * @var FilesystemInterface
     */
    protected $filesystem;
    /**
     * @var string
     */
    protected $filename;

    /**
     * @param FilesystemInterface $filesystem
     * @param $filename
     */
    public function __construct(FilesystemInterface $filesystem, $filename)
    {
        $this->filesystem = $filesystem;
        $this->filename = $filename;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        $this->filesystem->put($this->filename, $this->createMessage($level, $message));
    }

    protected function createMessage($level, $message)
    {
        return sprintf('[%s] [%s] - %s', $level, date('Y-m-d H:i:s'), $message);
    }
}
