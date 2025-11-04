<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AppInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Install App starting');
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->info('Pembuatan Akun Admin');
        $name= $this->ask('Nama Admin','Admin');
        $email= $this->ask('Email','email@gmail.com');
        $password= $this->secret('Kata Sandi','password');
        $level= 'admin';
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'level' => $level,
        ]);
    }
}
