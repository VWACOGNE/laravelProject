<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CataloguePageTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * Testing catalogue responding
     *
     * @return void
     */
    public function test_catalogue_request_http_200()
    {
        $response = $this->get('/catalogue');
        $response->assertStatus(200);
    }
    /**
     * Testing catalogue routing via named route
     *
     * @return void
     */
    public function test_catalogue_route_name()
    {
        $response = $this->get(route('catalogue'));
        $response->assertStatus(200);
    }

    /**
     * Testing catalogue routing via controller methode
     *
     * @return void
     */
    public function test_catalogue_controller_methode()
    {
        $response = $this->get(action([CategoryController::class, 'index']));
        $response->assertStatus(200);
    }

    /**
     * Check catalogue page view name
     *
     * @return void
     */
    public function test_catalogue_view_name()
    {
        $response = $this->get('/catalogue');
        $response->assertViewIs('catalogue');
    }

    /**
     * Check if view get passed good products informations
     *
     * @return void
     */
    public function test_catalogue_view_data()
    {

        //seed the database
        $this->seed(ProductSeeder::class);

        //quering
        $response = $this->get('/catalogue');

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
    public function test_catalogue_view_rendered()
    {

        //seed the database
        $this->seed(ProductSeeder::class);

        //quering
        $response = $this->get('/catalogue');

        //get the expecting products
        $products = Product::all();// TODO : verifier le trie / nombre des produits

        //check the parsed view
        $response->assertSee($products->first()->name);
    }
}
