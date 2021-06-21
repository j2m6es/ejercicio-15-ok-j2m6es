<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Tarea
{
    /**
	 * @ORM\
	 */
	protected $tecnico;

    /**
    *   @var string
    *   @ORM\Column(type="string",	nullable=false)
    */

        /**
     * Set tecnico
     *
     * @param string $tenico
     *
     * @return Tarea
     */
    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get tecnico
     *
     * @return Tecnico
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Tarea
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