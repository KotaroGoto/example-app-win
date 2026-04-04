<?php

use App\Models\User;

it('ログインできること', function () {
    $user = User::factory()->create();
    $page = visit('/login')
        ->fill('email', $user->email)
        ->fill('password', 'password')
        ->submit()
        ->assertPathIs('/tweet')
        ->assertSee('つぶやきアプリ');
});
