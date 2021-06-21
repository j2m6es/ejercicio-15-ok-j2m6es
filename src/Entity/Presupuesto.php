<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Presupuesto
{
        /**
	 * @ORM\Column(...)
	 */
    protected $cliente;

    /**
    *   @var string
    *   @ORM\Column(type="string",	nullable=false)
    */
    protected $estado;

    /**
     * Set cliente
     *
     * @param string $cliente
     *
     * @return Presupuesto
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Presupuesto
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