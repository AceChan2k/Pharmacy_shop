<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class CatAndProdTest extends TestCase
{
    use RefreshDatabase;

    public function testCatAndProd()
    {
        // Создаем тестовые данные для категории
        $categoryData = [
            'id' => '25',
            'title' => 'Новая категория',
            'description' => 'Описание категории',
            'image' => 'Новая фотография',
            'alias' => 'Новый алиас',
        ];

        // Добавляем категорию в базу данных
        Category::create($categoryData);
        // Проверяем, что категория была сохранен в базу данных
        $this->assertDatabaseHas('categories', $categoryData);

        // Отправляем GET-запрос на страницу категории
        $categoryAlias = $categoryData['alias'];
        $response = $this->get('/' . $categoryAlias);

        // Проверяем, что запрос выполнен успешно (статус 200)
        $response->assertStatus(200);

        // Создаем тестовые данные для товара
        $productData = [
            'id' => '2',
            'title' => 'Новый товар',
            'price' => '200',
            'description' => 'Описание товара',
            'image' => 'Новая фотография',
            'category_id' => '1',
        ];

        // Добавляем товар в базу данных
        Product::create($productData);
        // Проверяем, что товар был сохранен в базу данных
        $this->assertDatabaseHas('products', $productData);

        // Отправляем GET-запрос на страницу списка товаров
        $product_id = $productData['id'];
        $response = $this->get('/' . $categoryAlias . '/' . $product_id);

        // Проверяем, что запрос выполнен успешно (статус 200)
        $response->assertStatus(200);
    }

}
