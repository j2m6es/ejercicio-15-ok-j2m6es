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
	 * @ORM\
	 */
	protected $proyecto;

    /**
    *   @var string
    *   @ORM\Column(type="string",	nullable=false)
    */
    protected $estado;

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
     * Set proyecto
     *
     * @param string $proyecto
     *
     * @return Proyecto
     */
    public function setProyecto($proyecto)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return Proyecto
     */
    public function getproyecto()
    {
        return $this->proyecto;
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