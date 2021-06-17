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
}