<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInfo;
use App\Payment;
use App\Delivery;

class init extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin')
        ]);
        $user->isAdmin = 1;
        $user->save();
        UserInfo::create(["user_id" => $user->id, "photo" => "/img/profile.png"]);
        //init Payment
        Payment::create([
            'stripe_publishable_key' => '',
            'stripe_secret_key' => '',
            'paypal_client_id' => '',
            'paypal_secret' => ''
        ]);
        Delivery::create([
            'name' => 'Standard Delivery',
            'price' => 0
        ]);
    }
}
