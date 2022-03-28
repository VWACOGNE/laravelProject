<?php

namespace Tests\Feature;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryModelTest extends TestCase
{
    use RefreshDatabase;
    // Use faker in unit test
    use WithFaker;

    /**
     * Check model existence
     *
     * @return void
     */
    public function test_category_factory_instanciation()
    {
        $category = Category::factory()->make();
        $this->assertInstanceOf(Category::class, $category);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_property()
    {
        $category = Category::factory()->make();
        $this->assertIsString($category->name);
        $this->assertIsString($category->slug);
    }

    /**
     * Check  Factory feed all property
     *
     * @return void
     */
    public function test_category_persitence()
    {
        $category = Category::factory()->create();
        $this->assertModelExists($category);
    }

    /**
     * Check if seeder feed the table
     *
     * @return void
     */
    public function test_category_seeder()
    {
        $this->seed(CategorySeeder::class);
        $this->assertDatabaseCount('categories', 10);
    }

    /**
     *  check valid category in database
     *
     * @return void
     */
    public function test_valid_product()
    {
        $category = Category::factory()
            ->make();
        $category->name = $this->faker->word();
        $category->slug =  $this->faker->slug();
        $category->save();

        //check the number of products in data base
        $this->assertModelExists($category);
    }
}
