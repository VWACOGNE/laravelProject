<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * Testing home responding
     *
     * @return void
     */
    public function test_home_request_http_200()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /**
     * Testing home routing via named route
     *
     * @return void
     */
    public function test_home_route_name()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    /**
     * Testing home routing via controller methode
     *
     * @return void
     */
    public function test_home_controller_methode()
    {
        $response = $this->get(action([HomeController::class, 'index']));
        $response->assertStatus(200);
    }

    /**
     * Check home page view name
     *
     * @return void
     */
    public function test_home_view_name()
    {
        $response = $this->get('/');
        $response->assertViewIs('home');
    }

    /**
     * Check if view get passed good products informations
     *
     * @return void
     */
    public function test_home_view_data()
    {

        //seed the database
        $this->seed(ProductSeeder::class);

        //quering
        $response = $this->get('/');

        //get the expecting products
        $products = Product::all();// TODO : verifier le trie / nombre des produits

        // check data passing to the view
        $response->assertViewHas('products',$products);


    }

     /**
     * Check if view display product information
     *
     * @return void
     */
    public function test_home_view_rendered()
    {

        //seed the database
        $this->seed(ProductSeeder::class);

        //quering
        $response = $this->get('/');

        //get the expecting products
        $products = Product::all();// TODO : verifier le trie / nombre des produits

        //check the parsed view
        $response->assertSee($products->first()->name);
    }
}
