<?php

namespace App\Subscriber;

use App\Services\EnvioEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Workflow\Event\Event;
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
            'workflow.gestion_tarea.guard.terminar' => 'tareaTerminada'
        );
    }

    public function tareaTerminada(Event $event)
    {
        $tarea = $event->getSubject();
        $proyecto = $tarea->getProyecto();
        $jefeProyecto = $proyecto->getJefeproyecto();
        
        $msj = "El proyecto ha finalizado";

        // Enviamos al jefe de Proyecto de la tarea
        $this->envioEmail->enviarEmailJefeProyecto( $this->mailer, "Cambio estado proyecto", $msj, $jefeProyecto);
    }

}