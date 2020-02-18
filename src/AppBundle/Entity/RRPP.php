<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RRPP
 *
 * @ORM\Table(name="r_r_p_p")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RRPPRepository")
 */
class RRPP
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentaInstagram", type="string", length=50)
     */
    private $cuentaInstagram;

    /**
     * @var string
     *
     * @ORM\Column(name="numTel", type="string", length=255, nullable=true)
     */
    private $numTel;


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
     * Set username
     *
     * @param string $username
     *
     * @return RRPP
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return RRPP
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return RRPP
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return RRPP
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
     * Set cuentaInstagram
     *
     * @param string $cuentaInstagram
     *
     * @return RRPP
     */
    public function setCuentaInstagram($cuentaInstagram)
    {
        $this->cuentaInstagram = $cuentaInstagram;

        return $this;
    }

    /**
     * Get cuentaInstagram
     *
     * @return string
     */
    public function getCuentaInstagram()
    {
        return $this->cuentaInstagram;
    }

    /**
     * Set numTel
     *
     * @param string $numTel
     *
     * @return RRPP
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }
     /** 
  * @ORM\ManyToOne(targetEntity="Discoteca", inversedBy="rrpp")
 * @ORM\JoinColumn(name="rrpp_id", referencedColumnName="id")
 */
    private $Discoteca;
    
    function getDiscoteca() {
        return $this->Discoteca;
    }

    function setDiscoteca($Discoteca) {
        $this->Discoteca = $Discoteca;
    }


    
}

