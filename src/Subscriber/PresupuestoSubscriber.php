<?php

namespace App\Subscriber;

use App\Events\PresupuestoEvent;
use App\Services\EnvioEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;

class PresupuestoSubscriber implements EventSubscriberInterface
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
            'presupuesto.solicitado' => 'enviarCorreoPresupuestoSolicitado',
            'presupuesto.aprobado' => 'enviarCorreoPresupuestoAprobado'
        );
    }

    public function enviarCorreoPresupuestoSolicitado(PresupuestoEvent $event)
    {
        $presupuesto = $event->getPresupuesto();

        // Enviar correo al usuario con la info + carecteristicas de la app + presupuesto ...
        $this->envioEmail->enviarEmailCliente( $this->mailer, "Presupuesto Creado ...", $presupuesto->getCliente());

        // Enviar correo a todos los usuarios con rol “comercial” indicando los datos de contacto del solicitante, las características de la(s) aplicación(es) y el presupuesto orientativo
        $this->envioEmail->enviarEmailRedComercial( $this->mailer, "Presupuesto Creado ...");
    }

    public function enviarCorreoPresupuestoAprobado(PresupuestoEvent $event)
    {
        $presupuesto = $event->getPresupuesto();

        // Enviar correo al usuario con la info + carecteristicas de la app + presupuesto ...
        $this->envioEmail->enviarEmailCliente( $this->mailer, "Presupuesto Aceptado ...", $presupuesto->getCliente());

        // Enviar correo a todos los usuarios con rol “comercial” indicando los datos de contacto del solicitante, las características de la(s) aplicación(es) y el presupuesto orientativo
        $this->envioEmail->enviarEmailJefesProyecto( $this->mailer, "Presupuesto Creado ...");
    }
}