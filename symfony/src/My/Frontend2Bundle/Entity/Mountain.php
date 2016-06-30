<?php

namespace My\Frontend2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mountain
 *
 * @ORM\Table(name="mountain")
 * @ORM\Entity(repositoryClass="My\Frontend2Bundle\Repository\MountainRepository")
 */
class Mountain
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    public function __toString()
    {
        return $this->getName();
    }
    public function fromArray(array $data)
    {
        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            $this->$methodName($value);
        }
    }

    /**
     * Get id
     *
     * @return integer 
     */



    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Mountain
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Mountain
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }
}
