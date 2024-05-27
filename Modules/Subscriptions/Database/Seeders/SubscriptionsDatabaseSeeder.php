<?php

namespace Modules\Subscriptions\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Modules\Subscriptions\Entities\Package;

class SubscriptionsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        DB::table('packages')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('packages')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('packages')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('packages')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('packages')->insert([
            'name' => Str::random(10),
        ]);


        // $this->call("OthersTableSeeder");
    }
}