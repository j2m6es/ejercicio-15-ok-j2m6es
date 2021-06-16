<?php

namespace App\Services;

use App\Entity\Cliente as EntityCliente;

/** 
 * Clase de gestión de clientes:
 *  - Gestion de alta, baja, modificación, bloqueo de clientes
 *  - Login del cliente 
 *  - Restaurar acceso
 */
class Cliente
{
    /*
        Añade cliente 
        - A través de una pagina de alta de Clientes
        - Cuando se generar un presupuesto se puede pedir la información basica para generar el alta

        Parámetro Entrada: 
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
	*/
	public function altaCliente(Array $infoCliente): bool
    {
        return true;
    }
	
    /*
        Elimina cliente

        Parámetro Entrada: 
            Objeto Cliente: identifica el cliente a eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function eliminaCliente(EntityCliente $cliente): bool
    {
        return true;
    }
	
    /*
        Actualiza cliente

        Parámetro Entrada: 
            Objeto Cliente: identifica el cliente a eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
     */
	public function actualizaCliente(EntityCliente $cliente): bool
    {
        return true;
    }
	
    /*
        Logueo del cliente

        Parámetro Entrada: 
            user: login de usuario
            pwd: contraseña de usuario

        Respuesta: booleano que indica si se ha concedido el acceso
     */
	public function accesoCliente(string $user, string $pwd): bool
    {
        return true;
    }
		
    /*
        Restaurar acceso cliente, despliega la logica para restaurar un acceso bloqueado o que se ha olvidado el usuario de la pwd

        Parámetro Entrada: 
            Objeto Cliente: identifica el cliente

        Respuesta: booleano que indica si se ha restaurado el acceso
     */
	public function restaurarAcceso(EntityCliente $cliente): bool
    {
        return true;
    }
	
    /*
        Bloqueo cliente por acceso indebido o por petición del cliente

        Parámetro Entrada: 
            Objeto Cliente: identifica el cliente

        Respuesta: booleano que indica si se ha realizado la operación de bloqueo correctamente
     */
	public function bloqueo(EntityCliente $cliente): bool
    {
        return true;
    }
}