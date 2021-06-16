<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClienteControllerTest extends WebTestCase
{
    private $userName = '';
    private $pwd = '';

    public function __construct($userName, $pwd)
    {
        $this->userName = $userName;
        $this->pwd = $pwd;
    }

    /**
     * REQ-PUB-LOG-01: Caja para introducir el correo
     *
     * Se testea que se introduce como user_name un email valido
     */
    public function testControlEmail()
    {
        $client=static::createClient();
        $client->request('POST','/cliente/acceso', array("user_name"=>$this->userName, "pwd"=>$this->pwd));
        $request = $client->getRequest();
        
        $this->assertRegExp('^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$', $request->get('user_name'));
    }

    /**
     * REQ-PUB-LOG-01: Caja para introducir el correo
     *
     * Se testea que la accion se realiza correctamente
     */
    public function testAccesoCliente()
    {
        $client=static::createClient();
        $client->request('POST','/cliente/acceso', array("user_name"=>$this->userName, "pwd"=>$this->pwd));
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"amenendez", "pwd"=>"gdjhfdighgf"));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Error en login")')->count()
        );
    }
}