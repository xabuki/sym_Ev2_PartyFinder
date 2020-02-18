<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Discoteca
 *
 * @ORM\Table(name="discoteca")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiscotecaRepository")
 */
class Discoteca
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="cif", type="string", length=255)
     */
    private $cif;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Discoteca
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Discoteca
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Discoteca
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set cif
     *
     * @param string $cif
     *
     * @return Discoteca
     */
    public function setCif($cif)
    {
        $this->cif = $cif;

        return $this;
    }

    /**
     * Get cif
     *
     * @return string
     */
    public function getCif()
    {
        return $this->cif;
    }
    
    // ...
    /**
    * @ORM\OneToMany(targetEntity="Eventos", mappedBy="Discoteca")
    */
    private $eventos;
 
    /**
    * @ORM\OneToMany(targetEntity="RRPP", mappedBy="rrpp")
    */
    private $rrpp;
    
    /**
    * @ORM\OneToMany(targetEntity="RRPP", mappedBy="discoMaster")
    */
    private $discoMaster;
    
    
 public function __construct()
 {
 $this->rrpp = new ArrayCollection();
  $this->eventos = new ArrayCollection();
   $this->discoMaster = new ArrayCollection();
 }

}

