<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmRoom2 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_room', function($table)
        {
            $table->integer('unit')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_room', function($table)
        {
            $table->integer('unit')->nullable(false)->change();
        });
    }
}
