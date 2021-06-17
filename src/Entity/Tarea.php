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
}