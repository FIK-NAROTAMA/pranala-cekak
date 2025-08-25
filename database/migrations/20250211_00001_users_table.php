<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\MySqlBuilder;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('Column ID as a Primary key');
            $table->timestamps();
            $table->boolean('active')->nullable(false)->default(true)->comment('this user active or not?');
            $table->string('email', 64)->nullable(false)->unique()->comment('Email address also used for login name');
            $table->string('full_name', 255)->nullable(false)->comment('User full name');
            $table->string('password', 60)->nullable(false)->comment('password using bcrypt');
            $table->boolean('admin')->nullable(false)->default(false)->comment('is this user is admin?');
            $table->string('cookies_token', 32)->nullable(true)->default(null)->unique()->comment('cookies token for user');
            $table->string('forgot_token', 32)->nullable(true)->default(null)->unique()->comment('forgot password token for user');
            // table comment
            $table->comment('Users information');
        });

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'created_at')) {
//                $table->timestamp('created_at')->useCurrent()->comment('This data create at')->change();
//                $table->dateTime('created_at')->default('CURRENT_TIMESTAMP')->nullable(false)->comment('This data create at')->change();
                DB::statement('ALTER TABLE `users` CHANGE `created_at` `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP');
            }
            if (Schema::hasColumn('users', 'updated_at')) {
//                $table->timestamp('updated_at')->useCurrentOnUpdate()->comment('This data last update at')->change();
                DB::statement('ALTER TABLE `users` CHANGE `updated_at` `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
            }
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
