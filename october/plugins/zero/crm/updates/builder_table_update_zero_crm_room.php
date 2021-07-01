<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmRoom extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_room', function($table)
        {
            $table->text('number')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_room', function($table)
        {
            $table->integer('number')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
