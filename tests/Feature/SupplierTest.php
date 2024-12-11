<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */



    public function test_can_view_suppliers_list()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->get(route('supplier.index'));

        $response->assertStatus(200);
        $response->assertSee($response->nameds);
    }



    public function test_can_create_suppliers()
    {
        $postData = [
            'name' => 'Cemeti Pradana',
            'address' => 'Jr. Baranang Siang Indah No. 954, Tangerang 64102, Malut',
            'phone_number' => '(+62) 25 2251 9315'
        ];

        $response = $this->post(route('supplier.store'), $postData);
        $response = $this->get(route('supplier.index'));
        $this->assertDatabaseHas('suppliers', $postData);
    }

    public function test_can_view_edit_supplier_page()
    {

        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->get(route('supplier.edit', 1));

        $response->assertStatus(200);
        $response->assertSee('Edit Post');
    }

    public function test_can_update_supplier()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $updatedData = [
            'name' => 'Cemeti Pradana',
            'address' => 'Jr. Baranang Siang Indah No. 954, Tangerang 64102, Malut',
            'phone_number' => '(+62) 25 2251 9315'
        ];

        $response = $this->put(route('supplier.update', 1), $updatedData);
        $response = $this->get(route('supplier.index'));
        $response->assertStatus(201);
        $this->assertDatabaseHas('suppliers', $updatedData);
    }

    public function test_can_delete_post()
    {
        $response = $this->delete(route('supplier.destroy', 15));
        $response = $this->get(route('supplier.index'));
        $this->assertDatabaseMissing('suppliers', ['id' => 15]);
    }
}
