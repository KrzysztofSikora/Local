<?php

namespace My\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aktor
 *
 * @ORM\Table(name="aktor")
 * @ORM\Entity(repositoryClass="My\FrontendBundle\Repository\AktorRepository")
 */
class Aktor
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
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="aktorzy")
     * 
     */

    protected $filmy;

    /**
     * @var string
     *
     * @ORM\Column(name="imie", type="string", length=255)
     */

    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=255)
     */
    private $nazwisko;


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
     * Set imie
     *
     * @param string $imie
     * @return Aktor
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Aktor
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function __toString()
    {
        $imie = $this->getImie();
        $nazwisko = $this->getNazwisko();

        return "$imie $nazwisko";
    }

    /**
     * Get nazwisko
     *
     * @return string
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filmy = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add filmy
     *
     * @param \My\FrontendBundle\Entity\Film $filmy
     * @return Aktor
     */
    public function addFilmy(\My\FrontendBundle\Entity\Film $filmy)
    {
        $this->filmy[] = $filmy;

        return $this;
    }

    /**
     * Remove filmy
     *
     * @param \My\FrontendBundle\Entity\Film $filmy
     */
    public function removeFilmy(\My\FrontendBundle\Entity\Film $filmy)
    {
        $this->filmy->removeElement($filmy);
    }

    /**
     * Get filmy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilmy()
    {
        return $this->filmy;
    }
}
