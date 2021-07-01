<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmCustomer8 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->double('yged', 10, 0)->nullable();
            $table->string('username', 255)->change();
            $table->time('sign_time')->nullable()->unsigned(false)->default(null)->change();
            $table->renameColumn('ed', 'qyed');
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_customer', function($table)
        {
            $table->dropColumn('yged');
            $table->string('username', 255)->change();
            $table->dateTime('sign_time')->nullable()->unsigned(false)->default(null)->change();
            $table->renameColumn('qyed', 'ed');
        });
    }
}
