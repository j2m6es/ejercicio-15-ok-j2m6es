<?php

namespace App\Subscriber;

use App\Services\EnvioEmail;
use App\Services\Tarea;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Workflow\Event\Event;
use Symfony\Component\Workflow\Event\GuardEvent;
use Symfony\Contracts\Translation\TranslatorInterface;

class ProyectoSubscriber implements EventSubscriberInterface
{
    private $mailer;
    private $envioEmail;

    function __construct(MailerInterface $mailer, EnvioEmail $envioEmail)
    {
        $this->mailer = $mailer;
        $this->envioEmail = $envioEmail;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'workflow.gestion_proyecto.guard' => 'enviarCorreosCambioEstadoProyecto',
            'workflow.gestion_proyecto.guard.finalizar' => 'controlFinalizacionProyecto'
        );
    }

    public function enviarCorreosCambioEstadoProyecto(Event $event)
    {
        $proyecto = $event->getSubject();
        $cliente = $proyecto->getCliente();
        $tecnicos = $proyecto->getTecnicos();
        $msj = "El proyecto ha pasado a ".$proyecto->getEstado();

        // Enviamos información de cambio de estado al cliente
        $this->envioEmail->enviarEmailCliente( $this->mailer, "Cambio estado proyecto", $msj, $cliente);

        // Enviamos información de cambio de estado a los tecnicos
        $this->envioEmail->enviarEmailTecnico($this->mailer, "Cambio estado proyecto", $msj, $tecnicos);
    }

    public function controlFinalizacionProyecto(GuardEvent $event)
    {
        $proyecto = $event->getSubject();
        $tareas = $proyecto->getTareas();
        $todastareasFinalizadas = true;
        
        foreach( $tareas as $tarea)
        {
            if($tarea->getEstado()!=Tarea::ESTADO_FINALIZADO)
            {
                $todastareasFinalizadas = false;
            }
        }

        if($todastareasFinalizadas)
        {
            $event->setBlocked(true);
        }
    }
}