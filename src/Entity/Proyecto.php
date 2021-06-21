<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

class Proyecto
{
    /**
	 * @ORM\Column(...)
	 */
    protected $cliente;

    /**
	 * @ORM\Column(...)
	 */
    protected $tecnicos;

    /**
	 * @ORM\Column(...)
	 */
    protected $jefe_proyecto;

    /**
    *   @var string
    *   @ORM\Column(type="string",	nullable=false)
    */
    protected $estado;

    /**
	 * Constructor
	 */
	public function __construct()
	{
        $this->tecnicos = new ArrayCollection();
	}

    /**
     * Set cliente
     *
     * @param string $cliente
     *
     * @return Proyecto
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

        /**
     * Set tecnicos
     *
     * @param string $tecnicos
     *
     * @return Proyecto
     */
    public function setTecnicos($tecnicos)
    {
        $this->tecnicos = $tecnicos;

        return $this;
    }

    /**
     * Get tecnicos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTecnicos()
    {
        return $this->tecnicos;
    }

       /**
     * Set jefeproyecto
     *
     * @param string $jefeproyecto
     *
     * @return Proyecto
     */
    public function setJefeproyecto($jefeproyecto)
    {
        $this->jefeproyecto = $jefeproyecto;

        return $this;
    }

    /**
     * Get jefeproyecto
     *
     * @return Jefeproyecto
     */
    public function getJefeproyecto()
    {
        return $this->jefeproyecto;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Proyecto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}