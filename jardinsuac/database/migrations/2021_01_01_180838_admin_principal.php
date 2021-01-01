<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $u = new User();

        $u->name = 'Administrador';
        $u->email = 'admin@admin.pt';
        $u->password = Hash::make('admin');
        $u->admin_master = 1;

        $u->save();

        $u = new User();
        $u->name = "Sim";
        $u->email = "admin2@admin.pt";
        $u->password = Hash::make('admin2');
        $u->admin_master = 0;

        $u->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
