<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    // Reset your database after each of your tests
    use RefreshDatabase;
    // Use faker in unit test
    use WithFaker;

    /**
     * Check Product's model existence
     *
     * @return void
     */
    public function test_product_factory_instanciation()
    {
        // Create localy a model instance
        $product = Product::factory()
            ->make();

        // Check the type
        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * Check Product's Factory feed all property
     *
     * @return void
     */
    public function test_product_property()
    {
        // Create localy a model instance
        $product = Product::factory()
            ->make();
        // Check properties
        $this->assertIsString($product->name);
        $this->assertIsString($product->description);
        $this->assertIsInt($product->stock);
        $this->assertIsFloat($product->price);
    }


    /**
     * Check Product's model persistance in database.
     *
     * @return void
     */
    public function test_product_persitence()
    {
        // Create a model instance and store it in database
        $product = Product::factory()
            ->create();
        // Check the data base for the instance 
        $this->assertModelExists($product);
    }

    /**
     * Check if Product's seeder feed the table
     *
     * @return void
     */
    public function test_product_seeder()
    {
        // Call the seeder for product
        $this->seed(ProductSeeder::class);
        // Check the number of products in data base
        $this->assertDatabaseCount('products', 10);
    }


    /**
     *  check valid product in database
     *
     * @return void
     */
    public function test_valid_product()
    {
        $product = Product::factory()
            ->make();
        $product->name = $this->faker->text(254); // under  max varchar
        $product->stock = 65535 - 1; //under max unsigned smallint
        $product->price = $this->faker->numberBetween(100000, 10000000); // over the default value
        $product->save();

        //check the number of products in data base
        $this->assertModelExists($product);
    }
}
