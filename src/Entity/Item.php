<?php
namespace Acelaya\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class Item
 * @author
 * @link
 *
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item implements ArraySerializableInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        $this->setId(isset($array['id']) ? $array['id'] : null);
        $this->setTitle(isset($array['title']) ? $array['title'] : null);
        $this->setDescription(isset($array['description']) ? $array['description'] : null);
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}
