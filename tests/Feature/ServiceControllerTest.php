<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Service;
use App\Models\Category;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSearch()
    {
        Service::factory()->create([
            'name' => 'Test Service',
            'description' => 'This is a test service description.',
        ]);
        $response = $this->get(route('services.search', ['query' => 'Test']));
        $response->assertStatus(200);
        $response->assertSee('Test Service');
        $response->assertSee('This is a test service description.');
    }
    public function testStore()
    {
        $category = Category::factory()->create();
        $response = $this->post(route('services.store'), [
            'category_id' => $category->id,
            'name' => 'New Service',
            'description' => 'This is a new service description.',
            'price' => "100",
            'duration' => '1 hour',
        ]);
        $response->assertRedirect(route('services.index'))->assertSessionHas('success');
        $this->assertDatabaseHas('services', [
            'category_id' => $category->id,
            'name' => 'New Service',
            'description' => 'This is a new service description.',
            'price' => "100",
            'duration' => '1 hour',
        ]);
    }

}
