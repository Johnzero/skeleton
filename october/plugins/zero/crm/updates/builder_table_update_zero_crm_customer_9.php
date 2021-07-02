<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer9 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
            $table->dateTime('sign_time')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
            $table->time('sign_time')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
