<?php

namespace App\Services;

use App\Entity\Caracteristica;
use App\Entity\Servicio as EntityServicio;


/**
 * Clase que configura la administración de servicios
 */
class Servicio
{
    /*
        Crear servicio

        Parámetro Entrada: 
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function creaServicio(Array $infoCliente):bool
	{
		return true;
	}
	
	/*
        Elimina Servicio

        Parámetro Entrada: 
            servicio: Servicio que se quiere eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function eliminaServicio(EntityServicio $servicio):bool
	{
		return true;
	}
	
	/*
        Actualiza Servicio

        Parámetro Entrada: 
            servicio: Servicio que se quiere actualizar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function actualizaServicio(EntityServicio $servicio):bool
	{
		return true;
	}
	
	/*
        Asocia caracteristicas a un servicio

        Parámetro Entrada: 
            caracteristica: caracteristica que se asociará a un servicio
			servicio: servicio al que se le añaden caracteristicas

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function asociaCaracteristicas(Caracteristica $caracteristica, EntityServicio $servicio):bool
	{
		return true;
	}
	
	/*
        Quita caracteristicas a un servicio

        Parámetro Entrada: 
            caracteristica: caracteristica que se quitará a un servicio
			servicio: servicio al que se le quitan caracteristicas

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function quitaCaracteristicas(Caracteristica $caracteristica, EntityServicio $servicio):bool
	{
		return true;
	}
	
	/*
        Devuelve listado de Servicios (por ejemplo para mostrarlos en la LP o para añadir al AutoPresupuestador)

        Respuesta: Devuelve un listado de los servicios del aplicativo
     */
	public function devuelveServicios():array
	{
		return Array();
	}
}