<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer3 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
            $table->integer('sex')->nullable()->change();
            $table->string('idcard', 255)->nullable()->change();
            $table->string('tel', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
            $table->integer('sex')->nullable(false)->change();
            $table->string('idcard', 255)->nullable(false)->change();
            $table->string('tel', 255)->nullable(false)->change();
        });
    }
}
