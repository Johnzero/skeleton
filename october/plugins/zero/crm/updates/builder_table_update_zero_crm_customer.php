<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->integer('room_id');
            $table->integer('admin_id');
            $table->string('username', 255)->default(null)->change();
            $table->string('idcard', 255)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->dropColumn('room_id');
            $table->dropColumn('admin_id');
            $table->string('username', 255)->default(null)->change();
            $table->string('idcard', 255)->default(null)->change();
        });
    }
}
