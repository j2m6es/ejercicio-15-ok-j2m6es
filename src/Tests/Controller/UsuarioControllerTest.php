<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsuarioControllerTest extends WebTestCase
{

    /**
     * REQ-PUB-LOG-01: Caja para introducir el correo
     *
     * Se testea que se introduce como user_name un email valido
     */
    public function testControlEmail()
    {
        $client=static::createClient();
        $client->request('POST','/usuario/acceso', array("user_name"=>"l@prueba@.eseseseseses", "pwd"=>"xP12lmskl"));
        $request = $client->getRequest();
        
        $this->assertRegExp('^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$', $request->get('user_name'));
    }

    /**
     * REQ-PUB-LOG-02: Caja para introducir la contraseña
     *
     * Se valida que cumpla unos criterios de seguridad
     * - Entre 8 y 16 caracteres
     * - {1..N} dígito-s
     * - {1..N} minúscula
     * - {1..N} mayúscula
     * - No puede tener otros simbolos
     */
    public function testControlPwd()
    {
        $client=static::createClient();
        $client->request('POST','/usuario/acceso', array("user_name"=>"admin@empresa.es", "pwd"=>"xP12lmskl"));
        $request = $client->getRequest();
        
        $this->assertRegExp('^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$', $request->get('pwd'));
    }

    /**
     * REQ-PUB-LOG-03: Botón con el texto “Entrar”
     *
     * Comprobamos que el formulario tenga un boton con el texto "Entrar"
     */
    public function testBotonEntrar()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"admin@empresa.es", "pwd"=>"pwd_admin"));
       
        $this->assertEquals('Entrar',$crawler->selectButton('Entrar'));
    }

    /**
     * REQ-PUB-LOG-04: Al darle a Entrar, si la caja del correo está vacía, mostrará el mensaje “Debes indicar el correo”.
     *
     * Se testea que se introduce un email vacio
     */
    public function testControlEmailVacio()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>'', "pwd"=>$this->pwd));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Debes indicar el correo")')->count()
        );
    }

    /**
     * REQ-PUB-LOG-05: Al darle a Entrar, si la caja del correo está vacía, mostrará el mensaje “Debes indicar la contraseña”.
     *
     * Se testea que se introduce un pwd vacio
     */
    public function testControlPwdVacio()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"admin@empresa.es", "pwd"=>''));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Debes indicar la contraseña")')->count()
        );
    }

    /**
     * REQ-PUB-LOG-06: Al darle a Entrar, si los datos de identificación no son correctos mostrará el mensaje “Credenciales no válidas”.
     *
     * Se testea que si se introduce unas credenciales incorrectas salta el mensaje indicado
     */
    public function testCredencialesValidas()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>'usuario_erroneo', "pwd"=>'pwd_erroneo'));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Credenciales no válidas")')->count()
        );
    }

    /**
     * El REQ-PUB-LOG-07 se realiza en los REQ-PUB-LOG-08, REQ-PUB-LOG-09, REQ-PUB-LOG-10, REQ-PUB-LOG-11
     */

    /**
     * REQ-PUB-LOG-08: Si el usuario es un administrador, le dirigirá a la página del panel de control del administrador..
     *
     * Comprobamos que la acción salta al panel de control del administrador
     */
    public function testAccesoUsuarioAdministracion()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"pepe-admin@empresa.es", "pwd"=>"pwdpepe"));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Panel de control de administración")')->count()
        );
    }

    /**
     * REQ-PUB-LOG-09: Si el usuario es un comercial, le dirigirá a la página del panel de control del comercial
     *
     * Comprobamos que la acción salta al panel de control de comercial
     */
    public function testAccesoUsuarioComercial()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"maria-comercial@empresa.es", "pwd"=>"pwdmaria"));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Panel de control comercial")')->count()
        );
    }

        /**
     * REQ-PUB-LOG-10: Si el usuario es un jefe de proyecto, le dirigirá a la página del panel de control del jefe de proyecto
     *
     * Comprobamos que la acción salta al panel de control del JP
     */
    public function testAccesoUsuarioJefeProyecto()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"sonia-jp@empresa.es", "pwd"=>"pwdsonia"));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Panel de control de Jefe de Proyecto")')->count()
        );
    }

    /**
     * REQ-PUB-LOG-11: Si el usuario es un empleado distinto a [administrador, comercial, jefe de proyecto], le dirigirá a la página del panel de control del empleado.
     *
     * Comprobamos que la acción salta al panel de control del empleado
     */
    public function testAccesoUsuario()
    {
        $client=static::createClient();
        $client->followRedirects();
        $crawler = $client->request('POST','/usuario/acceso', array("user_name"=>"mario-gestor@empresa.es", "pwd"=>"pwdmario"));
       
        $this->assertGreaterThan(
            0,
            $crawler->filter('html h1.title:contains("Panel de control de empleado")')->count()
        );
    }
}