<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Eventos
 *
 * @ORM\Table(name="eventos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventosRepository")
 */
class Eventos
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255)
     */
    private $imagen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaApertura", type="time")
     */
    private $horaApertura;

    /**
     * @var int
     *
     * @ORM\Column(name="cantEntradasMax", type="integer")
     */
    private $cantEntradasMax;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Eventos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Eventos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Eventos
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
     * Set horaApertura
     *
     * @param \DateTime $horaApertura
     *
     * @return Eventos
     */
    public function setHoraApertura($horaApertura)
    {
        $this->horaApertura = $horaApertura;

        return $this;
    }

    /**
     * Get horaApertura
     *
     * @return \DateTime
     */
    public function getHoraApertura()
    {
        return $this->horaApertura;
    }

    /**
     * Set cantEntradasMax
     *
     * @param integer $cantEntradasMax
     *
     * @return Eventos
     */
    public function setCantEntradasMax($cantEntradasMax)
    {
        $this->cantEntradasMax = $cantEntradasMax;

        return $this;
    }

    /**
     * Get cantEntradasMax
     *
     * @return int
     */
    public function getCantEntradasMax()
    {
        return $this->cantEntradasMax;
    }
    
 // ...
 /** 
   * @ORM\ManyToOne(targetEntity="Discoteca", inversedBy="eventos")
 * @ORM\JoinColumn(name="Discoteca_id", referencedColumnName="id")
 */
    private $Discoteca;
    
     /**
    * @ORM\OneToMany(targetEntity="Entrada", mappedBy="entrada")
    */
    private $entrada;
    public function __construct()
    {
        $this->entrada = new ArrayCollection();
    }
    function getDiscoteca() {
        return $this->Discoteca;
    }

   

    function setDiscoteca($Discoteca) {
        $this->Discoteca = $Discoteca;
    }

  


}

