<?php

namespace App\Services;

use App\Entity\Usuario as EntityUsuario;

/** 
 * Gestión de Usuarios (Empleados)
 * Creación, modificación, eliminación, visualización, acceso, configurar idioma
 */
class Usuario
{
    /*
        Añade Usuario
        - A través de una pagina de alta de Empleados

        Parámetro Entrada:
            infoCliente: Array de información recuperada en el Controller por el objeto Request del formulario

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
    public function crearEmpleado(array $infoCliente): bool
    {
        return true;
    }
	
    /*
        Actualiza datos de Usuario

        Parámetro Entrada:
            usuario: usuario que se desea actualizar

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function actualizaEmpleado(EntityUsuario $usuario): bool
    {
        return true;
    }
	
    /*
        Elimina datos de Usuario

        Parámetro Entrada:
            usuario: usuario que se desea eliminar

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function eliminaEmpleado(EntityUsuario $usuario): bool
    {
        return true;
    }
	 
    /*
        Devuelve los datos de Usuario

        Parámetro Entrada:
            usuario: usuario que se desea consultar

        Respuesta: información que se va a motrar del usuario
    */
	public function verUsuario(EntityUsuario $usuario): array
    {
        return array();
    }
	
	/*
		Logueo del usuario interno, 
		Una vez validado saltará a la URL que defina su ROL
			• Panel del administrador (para usuarios con rol “administrador”)
			• Panel del comercial (para usuarios con rol “comercial”)
			• Panel del jefe de proyecto (para usuarios con rol “jefeproyecto”)
			• Panel del técnico (para usuarios con rol “tecnico”)
		Las plantillas y menús de la WEB también dependerán del ROL de usuario

        Parámetro Entrada: 
            usuario: login de usuario
            pwd: contraseña de usuario

        Respuesta: booleano que indica si se ha concedido el acceso
	*/
	public function acceso(string $usuario, string $pwd): bool
    {
        return true;
    }

    /*
        Marcar el idioma preferente

        Parámetro Entrada:
            usuario: usuario al que se desea configurar su idioma por defecto

        Respuesta: booleano que indica si se ha realizado bien la operación
    */
	public function configurarIdioma(EntityUsuario $usuario): bool
    {
        return true;
    }
}