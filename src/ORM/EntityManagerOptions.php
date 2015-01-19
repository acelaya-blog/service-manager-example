<?php
namespace Acelaya\ORM;

use Zend\Stdlib\AbstractOptions;

class EntityManagerOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $proxiesDir = '';
    /**
     * @var array
     */
    protected $entitiesDirs = [];
    /**
     * @var
     */
    protected $connection;

    /**
     * @return string
     */
    public function getProxiesDir()
    {
        return $this->proxiesDir;
    }

    /**
     * @param string $proxiesDir
     * @return $this
     */
    public function setProxiesDir($proxiesDir)
    {
        $this->proxiesDir = $proxiesDir;
        return $this;
    }

    /**
     * @return array
     */
    public function getEntitiesDirs()
    {
        return $this->entitiesDirs;
    }

    /**
     * @param array $entitiesDirs
     * @return $this
     */
    public function setEntitiesDirs($entitiesDirs)
    {
        $this->entitiesDirs = $entitiesDirs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     * @return $this
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
        return $this;
    }
}
