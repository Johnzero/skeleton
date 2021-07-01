<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer6 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
        });
    }
}
