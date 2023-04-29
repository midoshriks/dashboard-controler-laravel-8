<?php

use App\Models\type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->date('dob_date')->nullable();
            $table->string('gender');
            $table->integer('country_id')->nullable();
            $table->string('status')->default(1);
            $table->string('code_membership')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('role_permissions')->default('gaming');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable()->default('user.png');
            $table->string('login_via')->nullable()->default('mail');
            $table->string('otp')->nullable();
            $table->rememberToken();
            $table->text('device_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
