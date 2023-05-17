<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasketTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $categoryData;
    private $productData;

    public function setUp(): void
    {
        parent::setUp();
        // Создаем пользователя
        $this->user = User::factory()->create([
            'name' => 'username',
            'email' => 'user@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
        // Создаем категорию
        $this->categoryData = [
            'id' => '1',
            'title' => 'Новая категория',
            'description' => 'Описание категории',
            'image' => 'Новая фотография',
            'alias' => 'Новый алиас',
        ];


        // Создаем товар
        Category::create($this->categoryData);

        $this->productData = [
            'id' => '1',
            'title' => 'Новый товар',
            'price' => '200',
            'image' => 'Новая фотография',
            'description' => 'Описание товара',
            'category_id' => '1',
        ];

        Product::create($this->productData);
    }

    public function testBasketAddRemoveConfirm()
    {

        // Добавляем товар в корзину
        $response = $this->actingAs($this->user)->post('/basket/add/' . $this->productData['id']);

        // Проверяем, что запрос был успешным и произошло перенаправление
        $response->assertStatus(302)->assertRedirect();

         // Проверяем, что товар был добавлен в корзину
        $this->assertDatabaseHas('order_product', [
            'product_id' => $this->productData['id'],
        ]);

        // Отправляем POST-запрос для удаления товара из корзины
        $response = $this->actingAs($this->user)->post('/basket/remove/' . $this->productData['id']);

        // Проверяем, что запрос был успешным и произошло перенаправление
        $response->assertStatus(302)->assertRedirect();

        // Проверяем, что товар был удален из корзины
        $this->assertDatabaseMissing('order_product', [
            'product_id' => $this->productData['id'],
        ]);

        // Отправляем POST-запрос для добавления товара в корзину
        $response = $this->actingAs($this->user)->post('/basket/add/' . $this->productData['id']);
        $response->assertStatus(302)->assertRedirect();

        // Подготовка данных для подтверждения заказа
        $requestData = [
            'name' => 'Test User',
            'phone' => '1111111111',
        ];

        // Отправляем POST-запрос для подтверждения заказа
        $response = $this->actingAs($this->user)->post('/basket/place', $requestData);
        $response->assertStatus(302)->assertRedirect();

        // Проверяем, что заказ успешно сохранен
        $this->assertDatabaseHas('orders', [
            // Проверяем соответствие данных заказа
            'name' => $requestData['name'],
            'phone' => $requestData['phone'],
            // Проверяем, что заказ связан с пользователем
            'user_id' => $this->user->id,
        ]);

        // Проверяем наличие флеш-сообщения об успешном заказе
        $this->assertTrue(session()->has('success'));
        // Проверяем отсутствие флеш-сообщения об ошибке
        $this->assertFalse(session()->has('warning'));
        }
}