<?php

namespace App\Events;

use Symfony\Contracts\EventDispatcher\Event;

class PresupuestoEvent extends Event
{
    private $presupuesto;

    function __construct($presupuesto)
    {
        $this->presupuesto;
    }

    public function getPresupuesto()
    {
        return $this->presupuesto;
    }
}