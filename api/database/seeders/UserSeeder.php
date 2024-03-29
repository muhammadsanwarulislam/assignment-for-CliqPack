<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Repository\User\UserRepository;

class UserSeeder extends Seeder
{
    function __construct(protected UserRepository $userRepository)
    {
        $this->userRepository   =  $userRepository;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepository->model()::create([
            'username'  => 'Manager', 
            'email'     => 'manager@gmail.com',
            'password'  => 'password',
        ]);

        $this->userRepository->model()::create([
            'username'  => 'Teammate',
            'email'     => 'teammate@gmail.com',
            'password'  => 'password',
        ]);
        
    }
}
