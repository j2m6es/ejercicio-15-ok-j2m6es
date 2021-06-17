<?php

namespace App\Services;

use App\Entity\Proyecto as EntityProyecto;
use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Component\Mailer\MailerInterface;

/**
 * Clase gestora de proyectos, asignación de gestores y participantes de los proyectos, gestión de estados
 */
class Proyecto
{
	const ESTADO_NUEVO = 0;
	const ESTADO_PROCESO = 1;
	const ESTADO_FINALIZADO = 2;

    private $mailer;
    private $envioEmail;

    function __construct(MailerInterface $mailer, EnvioEmail $envioEmail)
    {
        $this->mailer = $mailer;
        $this->envioEmail = $envioEmail;
    }

	/*
        Crea Proyecto

        Parámetro Entrada: 
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function crearProyecto(Array $infoCliente):bool
	{
		$proyecto = new EntityProyecto();
		// ... creamos proyecto
		
		// Enviamos correo al solicitante con presupuesto final y enlace al panel del solicitante
		$this->envioEmail->enviarEmailCliente( $this->mailer, "Presupuesto final" , "Se inicia proyecto ...", $proyecto->getCliente());

		return true;
	}
	
	/*
        Acceder al listado de proyectos sin terminar y su grado de avance

        Respuesta: listado de proyectos abiertos
     */
	public function listadoProyectosAbiertos():array
	{
		return Array();
	}
	
	/*
        Acceder al histórico de listado de proyectos

        Respuesta: listado historico de proyectos
     */
	public function historicoProyectos():bool
	{
		return true;
	}

	/*
        Asocia un Jefe de Proyecto

        Parámetro Entrada: 
            proyecto: Proyecto al que se le va a asignar JP
			usuario: usuario JP que se va a asignar a un proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function asociarJefeProyecto(EntityProyecto $proyecto, Usuario $usuario):bool
	{
		return true;
	}
	
	/*
        Cambiar el Jefe de proyecto.

        Parámetro Entrada: 
            proyecto: Proyecto al que se le va a asignar JP
			usuario: usuario JP que se va a asignar a un proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function cambiarJefeProyecto(EntityProyecto $proyecto, Usuario $usuario):bool
	{
		return true;
	}
	
	/*
        Asociar técnico a proyectos que no hayan finalizado.

        Parámetro Entrada: 
            proyecto: Proyecto al que se le va a asignar tecnico
			usuario: usuario tecnico que se va a asignar a un proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function asociarTecnico(EntityProyecto $proyecto, Usuario $usuario):bool
	{
		return true;
	}
	
	/*
        Desasocia técnico a proyectos que no hayan terminado

        Parámetro Entrada: 
            proyecto: Proyecto al que se le va a desasignar tecnico
			usuario: usuario tecnico que se va a desasignar a un proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function desasociarTecnico(EntityProyecto $proyecto, Usuario $usuario):bool
	{
		return true;
	}
	
	/*
        El jefe de proyecto podrá cambiar el estado de un proyecto:
		- aprobado a enproceso 
		- en proceso a terminado (solo si están las tareas terminadas)

        Parámetro Entrada: 
            proyecto: Proyecto al que se le quiere cambiar el estado
			estado: Estado al que se quiere pasar el proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function cambiarEstadoProyecto(EntityProyecto $proyecto, $estado):bool
	{
		// Enviamos correo al solicitante
		$this->envioEmail->enviarEmailCliente( $this->mailer, "Presupuesto cambia de estado" , "Presupuesto cambia de estado ...", $proyecto->getCliente());

		// Enviamos correo a los tecnicos asociados al proyecto
		$this->envioEmail->enviarEmailTecnico( $this->mailer, "Presupuesto cambia de estado" , "Presupuesto cambia de estado ...", $proyecto->getTecnicos());
		return true;
	}
	
	/*
        Ver información del proyecto, la información se visualizará según perfil de usuario

        Parámetro Entrada: 
            proyecto: Proyecto que se quiere mostrar
			usuario: según el perfil del usuario se habilitará información de tipo financiera entre otras cosas

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function verProyecto(EntityProyecto $proyecto, Usuario $usuario):bool
	{
		return true;
	}
	
	/*
        Listar proyectos asociados a un usuario

        Parámetro Entrada: 
            usuario: usuario al que se le quiere ver sus proyectos

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function listarProyectos(UsuarioRepository $usuario):array
	{
		return Array();
	}
}