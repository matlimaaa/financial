<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'uuid' => Str::uuid(),
            'agency' => '1081',
            'account' => '10330',
            'holder' => 'BRADESCO 103306',
            'status' => 1,
            'bank_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('accounts')->insert([
            'uuid' => Str::uuid(),
            'agency' => '0772',
            'account' => '2847',
            'holder' => 'CAIXA',
            'status' => 1,
            'bank_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('accounts')->insert([
            'uuid' => Str::uuid(),
            'agency' => '06009',
            'account' => '248193',
            'holder' => '248193',
            'status' => 1,
            'bank_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('accounts')->insert([
            'uuid' => Str::uuid(),
            'agency' => '06009',
            'account' => '76791',
            'holder' => '76791',
            'status' => 1,
            'bank_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('accounts')->insert([
            'uuid' => Str::uuid(),
            'agency' => '06009',
            'account' => '213225',
            'holder' => '21322',
            'status' => 1,
            'bank_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('accounts')->insert([
            'uuid' => Str::uuid(),
            'agency' => '06009',
            'account' => '137804',
            'holder' => 'SÃO SIMÃO',
            'status' => 1,
            'bank_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
