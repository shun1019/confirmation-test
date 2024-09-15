<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login()
    {
        // ユーザー作成
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        // ログイン試行
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        // リダイレクトの確認
        $response->assertRedirect('/');
    }
}
