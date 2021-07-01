<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer5 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->dateTime('sign_time')->nullable();
            $table->string('progress', 255)->nullable();
            $table->string('can_pz', 20)->nullable();
            $table->double('ed', 10, 0)->nullable();
            $table->string('dkname')->nullable();
            $table->string('cl', 255)->nullable();
            $table->string('yhjd', 255)->nullable();
            $table->double('yped', 10, 0)->nullable();
            $table->double('yfed', 10, 0)->nullable();
            $table->double('wfed', 10, 0)->nullable();
            $table->string('fksh', 255)->nullable();
            $table->text('bz')->nullable();
            $table->string('username', 255)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->dropColumn('sign_time');
            $table->dropColumn('progress');
            $table->dropColumn('can_pz');
            $table->dropColumn('ed');
            $table->dropColumn('dkname');
            $table->dropColumn('cl');
            $table->dropColumn('yhjd');
            $table->dropColumn('yped');
            $table->dropColumn('yfed');
            $table->dropColumn('wfed');
            $table->dropColumn('fksh');
            $table->dropColumn('bz');
            $table->string('username', 255)->change();
        });
    }
}
