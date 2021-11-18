<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        //$this->call(CompaniesTableSeeder::class);
        //$this->call([CompaniesTableSeeder::class,ContactsTableSeeder::class]);
        //Company::factory()->count(10)->create();
        //Contact::factory()->count(10)->create();

        $users = User::factory(5)->create();

        $users->each(function ($user) {
            $companies = $user->companies()->saveMany(
                Company::factory(rand(2, 5))->make()
            );
            $companies->each(function ($company) use ($user) {
                $company->contacts()->saveMany(
                    Contact::factory(rand(5, 10))
                        ->make()
                        ->map(function ($contact) use ($user) {
                            $contact->user_id = $user->id;
                            return $contact;
                        })
                );
            });
        });
    }
}

