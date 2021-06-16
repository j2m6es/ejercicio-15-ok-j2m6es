<?php

namespace App\Services;

use App\Entity\Proyecto;
use App\Entity\Tarea as EntityTarea;
use App\Entity\Usuario;
use App\Repository\ProyectoRepository;
use App\Repository\TareaRepository;
use App\Repository\UsuarioRepository;

/**
 * Clase en la que se definen las tareas, se asocian a los proyectos y gestión de estados
 */
class Tarea
{
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
	public function cambiarEstado(Proyecto $proyecto):bool
	{
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