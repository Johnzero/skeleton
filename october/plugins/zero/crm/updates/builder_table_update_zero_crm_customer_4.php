<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer4 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
            $table->integer('admin_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->string('username', 255)->change();
            $table->integer('admin_id')->nullable(false)->change();
        });
    }
}
