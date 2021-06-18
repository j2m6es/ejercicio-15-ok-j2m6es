<?php

namespace App\Services;

use App\Entity\Cliente;
use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * Clase que centraliza el envío de emails a diferentes perfiles
 */
class EnvioEmail
{
    private $container;
    private $usuarioReposity;

    public function __construct(UsuarioRepository $usuarioReposity)
    {
        $this->usuarioReposity = $usuarioReposity;
    }

    /*
		Se envía email al usuario 
		- Resumen del presupuesto
		- Aprobación del presupuesto con enlace con información del proyecto
		- Rechazo del presupuesto

         Parámetro Entrada:
            mailer: servicio de envio de emails
            mensaje: texto del mensaje
            cliente: destinatario del email
            idioma: idioma en el que se le envia el email

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function enviarEmailCliente(MailerInterface $mailer, string $asunto, string $mensaje, Cliente $cliente):bool
    {
        $emailEmpresa = $this->get('emailEmpresa');
        $emailCliente = $cliente->getEmail();

        $email = (new Email())
                    ->from($emailEmpresa)
                    ->to($emailCliente)
                    ->subject($asunto)
                    ->text($mensaje);

        $mailer->send($email);

        return true;
    }
	
	/* 
        Se envía email a la red comercial con información del presupuesto y datos del cliente
        
        Parámetro Entrada:
            mailer: servicio de envio de emails
            mensaje: texto del mensaje
            usuario: repositorio de usuarios para obtener todos los comerciales

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function enviarEmailRedComercial(MailerInterface $mailer, string $asunto, string $mensaje):bool
    {
        $usuariosRedComercial = $this->usuarioReposity->getUsuariosRedComercial();
        $emailEmpresa = $this->get('emailEmpresa');

        foreach( $usuariosRedComercial as $usuario )
        {
            $emailUsuario = $usuario->getEmail();

            $email = (new Email())
                        ->from($emailEmpresa)
                        ->to($emailUsuario)
                        ->subject($asunto)
                        ->text($mensaje);

            $mailer->send($email);
        }

        return true;
    }
	
	/* 
		Se envía email al jefe de proyecto para 
		- Notificar que va a atender el proyecto cuando se acepta un presupuesto
		- Notificar que una tarea ha sido terminada

        Parámetro Entrada:
            mailer: servicio de envio de emails
            mensaje: texto del mensaje
            usuario: jefe de proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
	*/
	public function enviarEmailJefeProyecto(MailerInterface $mailer,string $asunto, string $mensaje, Usuario $usuario):bool
    {
        $emailEmpresa = $this->get('emailEmpresa');
        $emailUsuario = $usuario->getEmail();

        $email = (new Email())
                    ->from($emailEmpresa)
                    ->to($emailUsuario)
                    ->subject($asunto)
                    ->text($mensaje);

        $mailer->send($email);

        return true;
    }

    	/* 
		Se envía email a todos los jefe de proyecto 

        Parámetro Entrada:
            mailer: servicio de envio de emails
            mensaje: texto del mensaje

        Respuesta: booleano que indica si se ha realizado bien la operación
	*/
	public function enviarEmailJefesProyecto(MailerInterface $mailer, string $asunto, string $mensaje):bool
    {
        $usuariosJefeProyecto = $this->usuarioReposity->getUsuariosJefeProyecto();
        $emailEmpresa = $this->get('emailEmpresa');

        foreach( $usuariosJefeProyecto as $usuario )
        {
            $emailUsuario = $usuario->getEmail();

            $email = (new Email())
                        ->from($emailEmpresa)
                        ->to($emailUsuario)
                        ->subject($asunto)
                        ->text($mensaje);

            $mailer->send($email);
        }

        return true;
    }
	
	/*
        Se envía email al tecnico con la información de tarea asignada

        Parámetro Entrada:
            mailer: servicio de envio de emails
            mensaje: texto del mensaje
            usuario: tecnico

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function enviarEmailTecnico(MailerInterface $mailer, string $asunto, string $mensaje, $tecnicos):bool
    {
        if(!is_array($tecnicos))
        {
            $tecnicos = array($tecnicos);
        }

        $emailEmpresa = $this->get('emailEmpresa');

        foreach( $tecnicos as $usuario )
        {
            $emailUsuario = $usuario->getEmail();

            $email = (new Email())
                        ->from($emailEmpresa)
                        ->to($emailUsuario)
                        ->subject($asunto)
                        ->text($mensaje);

            $mailer->send($email);
        }

        return true;
    }
}