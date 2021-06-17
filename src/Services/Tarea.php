<?php

namespace App\Services;

use App\Entity\Proyecto;
use App\Entity\Tarea as EntityTarea;
use App\Entity\Usuario;
use App\Repository\ProyectoRepository;
use App\Repository\TareaRepository;
use App\Repository\UsuarioRepository;
use App\Services\Proyecto as ServicesProyecto;

/**
 * Clase en la que se definen las tareas, se asocian a los proyectos y gestión de estados
 */
class Tarea
{
	const ESTADO_NUEVO = 0;
	const ESTADO_PROCESO = 1;
	const ESTADO_FINALIZADO = 2;

	/*
        Crear tareas

        Parámetro Entrada: 
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function crearTarea(Array $infoCliente):bool
	{
		return true;
	}
	
	/*
        Asociar un técnico del proyecto a una tarea del proyecto

        Parámetro Entrada: 
            tarea: tarea a asociar al usuario
			usuario: usuario asociado a la tarea

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function asociarTecnico(EntityTarea $tarea, Usuario $usuario):bool
	{
		// Avisar al tecnico sobre la tarea asignada
		$this->envioEmail->enviarEmailTecnico( $this->mailer, "Tarea asignada" , "Tarea asignada ...", $tarea->getTecnico());

		return true;
	}
	
	/*
        Cambiar el técnico que está asociado a una tarea.

        Parámetro Entrada: 
            tarea: tarea a asociar al usuario
			usuario: usuario asociado a la tarea

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function cambiarTecnico(EntityTarea $tarea, Usuario $usuario):bool
	{
		// Avisar al tecnico sobre la tarea asignada
		$this->envioEmail->enviarEmailTecnico( $this->mailer, "Tarea asignada" , "Tarea asignada ...", $tarea->getTecnico());

		return true;
	}
	
	/*
        Devuelve las tareas de un proyecto

        Parámetro Entrada: 
            proyecto: proyecto sobre el que se quiere conocer sus tareas

        Respuesta: Listado de tareas de un proyecto
     */
	public function devuelveTareasProyecto(ProyectoRepository $proyecto):array
	{
		return Array();
	}
	
	/*
        Cambia el estado de una tarea (marcar como terminada)

        Parámetro Entrada: 
            proyecto: Proyecto sobre el que se quiere cambiar el estado

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function cambiarEstado(Proyecto $proyecto, EntityTarea $tarea):bool
	{
		if($tarea->getEstado == $this::ESTADO_FINALIZADO)
		{
			$this->envioEmail->enviarEmailJefeProyecto( $this->mailer, "Tarea finalizada" , "Tarea finalizada ...", $proyecto->getJefeProyecto());
		}
		return true;
	}
	
	/*
        Ver listado de tareas

        Parámetro Entrada: 
            proyecto: Proyecto sobre el que se quiere consultar sus tareas
			usuario: Listado de Tareas de un usurio en un proyecto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function verTareas(Proyecto $proyecto, Usuario $usuario, ProyectoRepository $proyectoRepository):array
	{
		return Array();
	}
}