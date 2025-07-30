<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $contact = Contact::create([
            'telephone' => '66035300',
            'email' => 'bore.younous59@gmail.com',
            'address' => 'Bamako',
            'whatsapp' => '+22366035300',
        ]);

        User::create([
            'nomComplet' => 'Bore younouss',
            'login' => 'admin',
            'password' => bcrypt(12345678),
            'id_role' => 1,
            'id_contact' => $contact->id,
        ]);

        for ($i = 0; $i < 10; $i++) {
            $contact = Contact::create([
                'telephone' => $faker->phoneNumber,
                'email' =>  $faker->optional(0.5)->email(),
                'address' =>  $faker->optional(0.5)->address(),
                'whatsapp' =>  $faker->optional(0.5)->phoneNumber(),
            ]);

            User::create([
                'nomComplet' => $faker->name,
                'login' => $faker->unique()->userName(),
                'password' => bcrypt(12345678),
                'id_role' => rand(2, 3),
                'id_contact' => $contact->id,
            ]);
        }
    }
}
