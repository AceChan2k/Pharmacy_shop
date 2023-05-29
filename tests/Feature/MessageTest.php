<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $messageData;

    public function testMessage(): void
    {
        parent::setUp();
        // Создаем пользователя
        $this->user = User::factory()->create([
            'name' => 'username',
            'email' => 'user@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Создаем тестовые данные для сообщения
        $messageData = [
            'name' => 'username',
            'phone' => '+123456789',
            'mail' => 'user@example.com',
            'msg' => 'test message',
        ];

        // Отправляем POST-запрос для подтверждения отправки сообщения
        $response = $this->actingAs($this->user)->post('/ContactUs', $messageData);
        $response->assertStatus(302)->assertRedirect();
        
        // Проверка наличия созданного сообщения в базе данных
        $this->assertDatabaseHas('messages', $messageData);
    }
}
