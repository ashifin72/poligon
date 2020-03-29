<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
class UsersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор не известен',
                'email' => 'ashifin@bk.ru',
                'password' => Str::random(16),
            ],
            [
                'name' => 'Автор',
                'email' => 'ashifin@live.com',
                'password' => bcrypt('123456'),
            ],


        ];
        DB::table('users')->insert($data);
    }
}
