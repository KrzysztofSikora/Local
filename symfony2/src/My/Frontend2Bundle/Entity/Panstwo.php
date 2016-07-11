<?php

namespace My\Frontend2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panstwo
 *
 * @ORM\Table(name="panstwo")
 * @ORM\Entity(repositoryClass="My\Frontend2Bundle\Repository\PanstwoRepository")
 */
class Panstwo
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
     * @ORM\Column(name="nazwa", type="string", length=255)
     */
    private $nazwa;
    /**
     * @ORM\ManyToOne(targetEntity="Kontynent", inversedBy="panstwa")
     */
    protected $kontynent;

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
     * Set nazwa
     *
     * @param string $nazwa
     * @return Panstwo
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }
    /**
     * Get name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getNazwa();
    }
    /**
     * Set kontynent
     *
     * @param \My\Frontend2Bundle\Entity\Kontynent $kontynent
     * @return Panstwo
     */
    public function setKontynent(\My\Frontend2Bundle\Entity\Kontynent $kontynent = null)
    {
        $this->kontynent = $kontynent;

        return $this;
    }

    /**
     * Get kontynent
     *
     * @return \My\Frontend2Bundle\Entity\Kontynent 
     */
    public function getKontynent()
    {
        return $this->kontynent;
    }
}
