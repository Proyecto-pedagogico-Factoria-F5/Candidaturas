<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_user_can_see_home_page()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
    }

    public function test_user_can_see_login_page()
    {
        $response = $this->get('/login');//->middleware->{('auth')};
        $response->assertStatus(200);
    }

    public function test_user_can_see_promos_page()
    {
        $response = $this->get('/promos');
        $response->assertStatus(403); //queremos que de este error, ya que el usuario no tiene permisos
    }

    public function test_user_can_see_schools_page()
    {
        $response = $this->get('/escuelas');
        $response->assertStatus(403); //queremos que de este error, ya que el usuario no tiene permisos
    }

    public function test_user_can_see_candidaturas_page()
    {
        $response = $this->get('/candidaturas-view'); //el 1 es el id de la promo
        $response->assertStatus(200); 
    }

    
}
