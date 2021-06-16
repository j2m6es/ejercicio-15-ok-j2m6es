<?php

namespace App\Services;

use App\Entity\Rol as EntityRol;
use App\Entity\Usuario;


/** 
 * Gestión de Roles del aplicativo
 * Creación, Modificacion, Eliminación, Asignación, Visualización
 */
class Rol
{
    /*
        Crear Rol de usuario interno

        Parámetro Entrada:
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
    public function crearRol(Array $infoCliente): bool
    {
        return true;
    }
	
    /*
        Actualiza Rol de usuario interno

        Parámetro Entrada:
            rol: rol que se desea modificar

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function modificarRol(EntityRol $rol): bool
    {
        return true;
    }
	
    /*
        Elimina Rol de usuario interno

        Parámetro Entrada:
            rol: rol que se desea eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function eliminarRol(EntityRol $rol): bool
    {
        return true;
    }

    /*
        Asigna un rol a un usuario

        Parámetro Entrada:
            usuario: usuario a asociar al rol
            rol: rol al que se le va a asignar el usuario

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function asignarRol(Usuario $usuario, EntityRol $rol): bool
    {
        return true;
    }
	
    /*
        Devuelve los datos del ROL

        Parámetro Entrada:
            rol: rol que se desea consultar

        Respuesta: información que se va a motrar del ROL
    */
	public function verRol(EntityRol $rol): Array
    {
        return Array();
    }
}