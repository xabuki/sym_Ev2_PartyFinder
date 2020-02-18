<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrada
 *
 * @ORM\Table(name="entrada")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EntradaRepository")
 */
class Entrada
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
     * @ORM\Column(name="imagenEntrada", type="string", length=255)
     */
    private $imagenEntrada;

    /**
     * @var string
     *
     * @ORM\Column(name="horaLimite", type="string", length=255)
     */
    private $horaLimite;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=2, scale=0)
     */
    private $precio;


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
     * Set imagenEntrada
     *
     * @param string $imagenEntrada
     *
     * @return Entrada
     */
    public function setImagenEntrada($imagenEntrada)
    {
        $this->imagenEntrada = $imagenEntrada;

        return $this;
    }

    /**
     * Get imagenEntrada
     *
     * @return string
     */
    public function getImagenEntrada()
    {
        return $this->imagenEntrada;
    }

    /**
     * Set horaLimite
     *
     * @param string $horaLimite
     *
     * @return Entrada
     */
    public function setHoraLimite($horaLimite)
    {
        $this->horaLimite = $horaLimite;

        return $this;
    }

    /**
     * Get horaLimite
     *
     * @return string
     */
    public function getHoraLimite()
    {
        return $this->horaLimite;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Entrada
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }
    
    /**
    * @ORM\ManyToOne(targetEntity="Eventos", inversedBy="entrada")
    * @ORM\JoinColumn(name="entrada_id", referencedColumnName="id")
    */
    private $eventos;
   
    function getEventos() {
        return $this->eventos;
    }

    function setEventos($eventos) {
        $this->eventos = $eventos;
    }

    /** 
   * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="entrada")
 * @ORM\JoinColumn(name="Usuario_id", referencedColumnName="id")
 */
    private $usuario;

}

