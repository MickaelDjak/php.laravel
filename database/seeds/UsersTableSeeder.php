<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = $this->command->ask('How many users do you want to create', 20);

        factory(App\User::class, (int) $quantity)->create();
        factory(App\User::class)->state('mdjak')->create();
    }
}
