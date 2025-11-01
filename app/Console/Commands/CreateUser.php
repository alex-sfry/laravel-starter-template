<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create
                            {--username= : Username}
                            {--email= : User email}
                            {--password= : User password}
                            {--role= : User role (e.g. admin, user)}';

    protected $description = 'Create a new user via CLI with optional role assignment';

    public function handle()
    {
        $username = $this->option('username') ?: $this->ask('Username');
        $email = $this->option('email') ?: $this->ask('Email');
        $password = $this->option('password') ?: $this->secret('Password');

        // ✅ Handle empty --role or missing option properly
        $role = $this->option('role');

        if (empty($role)) {
            $role = $this->choice('Role', ['user', 'admin'], 0);
        }

        $role = strtolower($role);

        if (User::where('email', $email)->exists()) {
            $this->error("User with email {$email} already exists.");
            return 1;
        }

        if (User::where('username', $username)->exists()) {
            $this->error("User with Username {$username} already exists.");
            return 1;
        }

        $user = User::create([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
        ]);

        $this->info("✅ User '{$user->username}' created successfully with role '{$role}'.");
        return 0;
    }
}
