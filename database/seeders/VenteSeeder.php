<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Produit;
use App\Models\Vente;
use App\Models\VenteProduit;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $contact = Contact::create([
                'telephone' => $faker->phoneNumber,
                'email' => $faker->optional(0.5)->email(),
                'address' => $faker->optional(0.5)->address(),
                'whatsapp' => $faker->optional(0.5)->phoneNumber(),
            ]);

            $client = Client::create([
                'nomComplet' => $faker->lastName . ' ' . $faker->firstName,
                'id_contact' => $contact->id
            ]);

            $vente = Vente::create([
                'id_client' => $client->id
            ]);

            $montant = 0;

            for ($i = 0; $i < rand(1, 5); $i++) {
                $produit = Produit::inRandomOrder()->first();

                VenteProduit::create([
                    'montant' => $produit->prixVenteDetails,
                    'quantite' => rand(1, 15),
                    'id_produit' => $produit->id,
                    'id_vente' => $vente->id
                ]);

                $montant += $produit->prixVenteDetails;
            }

            $vente->montant = $montant;
            $vente->save();
        }
    }
}
