<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * skladiste
 *
 * @ORM\Table(name="skladiste")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\skladisteRepository")
 */
class skladiste
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
     * @ORM\Column(name="Nazev", type="string", length=255)
     */
    private $nazev;

    /**
     * @var float
     *
     * @ORM\Column(name="Cena", type="float")
     */
    private $cena;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nazev
     *
     * @param string $nazev
     *
     * @return skladiste
     */
    public function setNazev($nazev)
    {
        $this->nazev = $nazev;

        return $this;
    }

    /**
     * Get nazev
     *
     * @return string
     */
    public function getNazev()
    {
        return $this->nazev;
    }

    /**
     * Set cena
     *
     * @param float $cena
     *
     * @return skladiste
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return float
     */
    public function getCena()
    {
        return $this->cena;
    }
}

