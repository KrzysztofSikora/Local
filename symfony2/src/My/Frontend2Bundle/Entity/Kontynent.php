<?php

namespace My\Frontend2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kontynent
 *
 * @ORM\Table(name="kontynent")
 * @ORM\Entity(repositoryClass="My\Frontend2Bundle\Repository\KontynentRepository")
 */
class Kontynent
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
     * @ORM\OneToMany(targetEntity="Panstwo", mappedBy="kontynent")
     * @ORM\OrderBy({"nazwa" = "ASC"})
     */
    protected $panstwa;

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
     * @return Kontynent
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
     * Constructor
     */
    public function __construct()
    {
        $this->panstwa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add panstwa
     *
     * @param \My\Frontend2Bundle\Entity\Panstwo $panstwa
     * @return Kontynent
     */
    public function addPanstwa(\My\Frontend2Bundle\Entity\Panstwo $panstwa)
    {
        $this->panstwa[] = $panstwa;

        return $this;
    }

    /**
     * Remove panstwa
     *
     * @param \My\Frontend2Bundle\Entity\Panstwo $panstwa
     */
    public function removePanstwa(\My\Frontend2Bundle\Entity\Panstwo $panstwa)
    {
        $this->panstwa->removeElement($panstwa);
    }

    /**
     * Get panstwa
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPanstwa()
    {
        return $this->panstwa;
    }
}
