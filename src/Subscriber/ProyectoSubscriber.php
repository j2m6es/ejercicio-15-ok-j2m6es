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
            'workflow.gestion_proyecto.guard' => 'enviarCorreosCambioEstadoProyecto'
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
        $this->envioEmail->enviarEmailTecnico($this->mailer, "Cambio estado proyecto", $msj, $cliente);
    }

}