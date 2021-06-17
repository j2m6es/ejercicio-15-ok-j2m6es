<?php

namespace App\Subscriber;

use App\Events\PresupuestoEvent;
use App\Services\EnvioEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class PresupuestoSubscriber implements EventSubscriberInterface
{
    private $mailer;
    private $envioEmail;
    private $translator;

    function __construct(MailerInterface $mailer, EnvioEmail $envioEmail, TranslatorInterface $translator)
    {
        $this->mailer = $mailer;
        $this->envioEmail = $envioEmail;
        $this->translator = $translator;
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
        
        $locale = $presupuesto->getCliente()->getLocale();
        $msj = $this->translator->trans("email_usuario_presupuesto_iniciado", array(), $locale);

        // Enviar correo al usuario con la info + carecteristicas de la app + presupuesto ...
        $this->envioEmail->enviarEmailCliente( $this->mailer, "Presupuesto Creado" , $msj, $presupuesto->getCliente());

        // Enviar correo a todos los usuarios con rol “comercial” indicando los datos de contacto del solicitante, las características de la(s) aplicación(es) y el presupuesto orientativo
        $this->envioEmail->enviarEmailRedComercial( $this->mailer, "Presupuesto Creado", "Presupuesto Creado ...");
    }

    public function enviarCorreoPresupuestoAprobado(PresupuestoEvent $event)
    {
        $presupuesto = $event->getPresupuesto();

        $locale = $presupuesto->getCliente()->getLocale();
        $msj = $this->translator->trans("email_usuario_presupuesto_aprobado", array(), $locale);

        // Enviar correo al usuario con la info + carecteristicas de la app + presupuesto ...
        $this->envioEmail->enviarEmailCliente( $this->mailer, "Presupuesto Aceptado", $msj, $presupuesto->getCliente());

        // Enviar correo a todos los usuarios con rol “comercial” indicando los datos de contacto del solicitante, las características de la(s) aplicación(es) y el presupuesto orientativo
        $this->envioEmail->enviarEmailJefesProyecto( $this->mailer, "Presupuesto Aceptado", "Presupuesto Creado ...");
    }
}