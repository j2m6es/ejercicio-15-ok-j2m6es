<?php

namespace App\Services;

use App\Entity\Caracteristica as EntityCaracteristica;
use App\Entity\Servicio;
use App\Repository\ServicioRepository;

/**
 * Clase define las caracteristicas de los distintos servicios
 */
class Caracteristica
{
	/*
        Crea Caracteristicas

        Parámetro Entrada: 
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function creaCaracteristica(Array $infoCliente):bool
	{
		return true;
	}
	
	/*
        Elimina Caracteristicas

        Parámetro Entrada: 
            caracteristica: identifica la caracteristica a eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function eliminaCaracteristica(EntityCaracteristica $caracteristica):bool
	{
		return true;
	}
	
	/*
        Actualiza Caracteristicas

        Parámetro Entrada: 
            Objeto Cliente: identifica la caracteristica a actualizar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function actualizaCaracteristica(EntityCaracteristica $caracteristica):bool
	{
		return true;
	}
	
	/*
        Devuelve listado de caracteristicas de un Servicio

        Parámetro Entrada: 
            servicio: servicio del que se quiere conocer sus caracteristicas

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function devuelveCaracteristicaServicio(ServicioRepository $servicioRepository, Servicio $servicio):array
	{
		return Array();
	}
}