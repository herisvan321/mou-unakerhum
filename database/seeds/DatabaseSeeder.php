<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table("users")->insert([
            [
                "name" => "Pendidikan Geografi",
                "username" => "Geografi",
                "email" => "pendidikangeografi@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Bahasa Inggris",
                "username" => "BIngg",
                "email" => "pendidikanbahasainggris@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Matematika",
                "username" => "Matematika",
                "email" => "pendidikanmatematika@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Bimbingan dan Konseling",
                "username" => "BK",
                "email" => "pendidikanbk@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Sosiologi",
                "username" => "Sosiologi",
                "email" => "pendidikansosiologi@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Bahasa dan Sastra Indonesia",
                "username" => "BI",
                "email" => "pendidikanbi@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Ekonomi",
                "username" => "Ekonomi",
                "email" => "pendidikanekonomi@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Informatika",
                "username" => "Informatika",
                "email" => "pendidikaninformatika@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Fisika",
                "username" => "Fisika",
                "email" => "pendidikanfisika@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan IPS",
                "username" => "IPS",
                "email" => "pendidikanips@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Pancasila dan Kewarganegaraan",
                "username" => "PKN",
                "email" => "pendidikanpkn@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
            [
                "name" => "Pendidikan Akuntansi",
                "username" => "Akuntansi",
                "email" => "pendidikanakuntansi@stkip.com",
                "password" => Hash::make("12345678"),
                "level" => 1
            ],
        ]);
    }
}
