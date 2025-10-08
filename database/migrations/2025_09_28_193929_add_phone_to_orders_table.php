<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'total')) {
                $table->decimal('total', 10, 2)->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
