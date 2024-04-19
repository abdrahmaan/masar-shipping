<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::updateOrCreate(["default"=>1],
        [
            "default"  => 1,
            "companyName"  => "أطلس الذهبية للمصاعد",
            "bankName"  => "بنك الأنماء",
            "accNumber"  => "68204530730000",
            "iban" => "SA1305000068204530730000",
        ]
        );
    }
}
