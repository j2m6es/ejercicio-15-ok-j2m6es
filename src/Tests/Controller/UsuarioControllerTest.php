<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsuarioControllerTest extends WebTestCase
{
    private $userName = '';
    private $pwd = '';

    public function __construct($userName, $pwd)
    {
        $this->userName = $userName;
        $this->pwd = $pwd;
    }

    /**
     * REQ-PUB-LOG-11: Si el usuario es un empleado distinto a [administrador, comercial, jefe de proyecto], le dirigirá a la página del panel de control del empleado.
     *
     * Comprobamos que la acción salta al panel de control del empleado
     */
    public function testAccesoUsuario()
    {
        $client=static::createClient();
        $crawler = $client->request('POST','/cliente/acceso', array("user_name"=>$this->userName, "pwd"=>$this->pwd));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Panel de control de empleado")')->count()
        );
    }
}