<?php

namespace App\Services;

use App\Entity\Cliente;
use App\Entity\Presupuesto as EntityPresupuesto;
use App\Entity\Servicio;
use App\Entity\Usuario;
use App\Events\PresupuestoEvent;
use App\Repository\PresupuestoRepository;
use App\Services\Cliente as ServiceCliente;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Clase gestora de presupuestos y su conversión a Contrato por parte de Jefes de Proyecto y Empleados
 */
class Presupuesto
{
	private $presupuesto;

	function __construct($presupuesto)
	{
		$this->presupuesto=$presupuesto;
	}
	/*
        Crea Presupuesto y anota información del visitante

        Parámetro Entrada: 
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function creaPresupuesto(Array $infoCliente, ServiceCliente $cliente, EventDispatcherInterface $dispatcher):bool
	{
		$cliente->altaCliente($infoCliente);

		// Generar Evento onPresupuestoSolicitado
		$infoEvento = new PresupuestoEvent($this->presupuesto);
		$dispatcher->dispatch('presupuesto.solicitado', $infoEvento);

		return true;
	}
	
	/*
        Editar Presupuesto

        Parámetro Entrada: 
            presupuesto: presupuesto que se quiere editar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function editaPresupuesto(EntityPresupuesto $presupuesto):bool
	{
		return true;
	}
	
	/*
        Eliminar Presupuesto

        Parámetro Entrada: 
            presupuesto: presupuesto que se quiere eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function eliminaPresupuesto(EntityPresupuesto $presupuesto):bool
	{
		return true;
	}
	
	/*
        Añade servicio a autopresupuestador (App WEB, Movil o escritorio con la configuración de cada tipo de aplicación)

        Parámetro Entrada: 
            presupuesto: presupuesto al que se le quiere añadir el servicio
			servicio: servicio que se va a añadir al presupuesto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function asociaServicio(EntityPresupuesto $presupuesto, Servicio $servicio):bool
	{
		return true;
	}
	
	/*
        Quita servicio de autopresupuestador

        Parámetro Entrada: 
            presupuesto: presupuesto al que se le quiere quitar el servicio
			servicio: servicio que se va a quitar al presupuesto

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function quitaServicio(EntityPresupuesto $presupuesto, Servicio $servicio):bool
	{
		return true;
	}
	
	/*
        Muestra Presupuesto (según los tipos de aplicaciones contratadas y sus caracteristicas se generará un presupuesto)

        Parámetro Entrada: 
            presupuesto: presupuesto sobre el que se va a hacer el calculo

        Respuesta: calculo del presupuesto
     */
	public function calculoPresupuesto(PresupuestoRepository $presupuestoRepository, EntityPresupuesto $presupuesto):float
	{
		return 100.10;
	}
	
	/*
		Aprueba un presupuesto y lo convierte a contrato
	    Son necesarios los datos: “presupuesto final” y “fecha de entrega”. 
	    Al aprobar una solicitud de presupuesto, se mandarán correos al solicitante y a los jefes de proyecto

        Parámetro Entrada: 
            presupuesto: Presupuesto que se va a aprobar, los campos “presupuesto final” y “fecha de entrega” van dentro de este parámetro

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function aprobarPresupuesto(EntityPresupuesto $presupuesto, EventDispatcherInterface $dispatcher):bool
	{
		// Generar Evento onPresupuestoAprobado
		$infoEvento = new PresupuestoEvent($this->presupuesto);
		$dispatcher->dispatch('presupuesto.aprobado', $infoEvento);

		return true;
	}
	
	/*
        Rechaza un presupuesto 

        Parámetro Entrada: 
            presupuesto: Presupuesto que se va a rechazar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function rechazarPresupuesto(EntityPresupuesto $presupuesto):bool
	{
		// Generar Evento onPresupuestoAprobado
		return true;
	}

	/*
        Devuelve cliente asociado al presupuesto 

		NOTA:Este metodo seguramente irian en el entity de Presupuesto si existieran

        Parámetro Entrada: 
            presupuesto: Presupuesto del que se quiere conocer el cliente

        Respuesta: cliente asociado al presupuesto
     */
	public function getCliente(EntityPresupuesto $presupuesto):Cliente
	{
		$cliente = new Cliente(); // NO sería un NEW sino recuperar el cliente asociado al presupuesto, lo dejo así para que no deje error
		return $cliente;
	}

	/*
        Devuelve JP asociado al presupuesto 

		NOTA:Este metodo seguramente irian en el entity de Presupuesto si existieran

        Parámetro Entrada: 
            presupuesto: Presupuesto del que se quiere conocer el JP

        Respuesta: JP asociado al presupuesto
     */
	public function getJefeProyecto(EntityPresupuesto $presupuesto):Usuario
	{
		$jefeProyecto = new Usuario(); // NO sería un NEW sino recuperar el cliente asociado al presupuesto, lo dejo así para que no deje error
		return $jefeProyecto;
	}
}