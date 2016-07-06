<?php

namespace My\Frontend5Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Treny
 *
 * @ORM\Table(name="treny")
 * @ORM\Entity(repositoryClass="My\Frontend5Bundle\Repository\TrenyRepository")
 */
class Treny
{
    /**
     * @Gedmo\Slug(fields={"tytul"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
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
     * @ORM\Column(name="tytul", type="string", length=255)
     */
    private $tytul;

    /**
     * @var string
     *
     * @ORM\Column(name="tresc", type="text")
     */
    private $tresc;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;
    
    public function __toString()
    {
        return $this->getTytul();
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
     * Set tytul
     *
     * @param string $tytul
     * @return Treny
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
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
     * Set tresc
     *
     * @param string $tresc
     * @return Treny
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;

        return $this;
    }

    /**
     * Get tresc
     *
     * @return string 
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Treny
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Treny
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
