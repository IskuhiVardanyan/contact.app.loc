<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('contacts')->truncate();

//........Seeding with Factory...........
        Contact::factory()->count(10)->create();

//........Seeding with seeder............
//        $contacts = [];
//        $faker = Faker::create();
//
//        foreach (range(1, 10) as $index) {
//            $contacts[] = [
//                'first_name'    =>   $faker->name,
//                'last_name'     =>   $faker->lastName,
//                'phone'         =>   $faker->phoneNumber,
//                'email'         =>   $faker->email,
//                'address'       =>   $faker->address,
//                'company_id'    =>   $faker->numberBetween(1,10),
//                'created_at'    =>   now(),
//                'updated_at'    =>   now(),
//            ];
//        }
//
//        DB::table('contacts')->insert($contacts);
    }
}
