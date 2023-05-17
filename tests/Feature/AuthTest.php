<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        // Создаем Пользователя
        $user = \App\Models\User::factory()->create([
            'name' => 'username',
            'email' => 'user@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Авторизуем пользователя          
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        // Проверяем, что пользователь авторизовался
        $this->assertTrue(Auth::check());

        // Проверяем, что приложение перенаправило пользователя на главную страницу
        $response->assertRedirect('/home');
    }
}