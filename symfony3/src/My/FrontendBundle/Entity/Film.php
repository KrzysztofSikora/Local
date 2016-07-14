<?php

namespace My\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="My\FrontendBundle\Repository\FilmRepository")
 */
class Film
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
     * @ORM\ManyToMany(targetEntity="Aktor", inversedBy="filmy")
     * @ORM\OrderBy({"nazwisko"="ASC", "imie"="ASC"})
     */
    private $aktorzy;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tytul", type="string", length=255)
     */
    private $tytul;


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
     * Set tytul
     *
     * @param string $tytul
     * @return Film
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
    }
    public function __toString()
    {
        return $this->getTytul();
    }
    /**
     * Get tytul
     *
     * @return string 
     */
    public function getTytul()
    {
        return $this->tytul;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aktorzy = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add aktorzy
     *
     * @param \My\FrontendBundle\Entity\Aktor $aktorzy
     * @return Film
     */
    public function addAktorzy(\My\FrontendBundle\Entity\Aktor $aktorzy)
    {
        $this->aktorzy[] = $aktorzy;

        return $this;
    }

    /**
     * Remove aktorzy
     *
     * @param \My\FrontendBundle\Entity\Aktor $aktorzy
     */
    public function removeAktorzy(\My\FrontendBundle\Entity\Aktor $aktorzy)
    {
        $this->aktorzy->removeElement($aktorzy);
    }

    /**
     * Get aktorzy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAktorzy()
    {
        return $this->aktorzy;
    }
}
