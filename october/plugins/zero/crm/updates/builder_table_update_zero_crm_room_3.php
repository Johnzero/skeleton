<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmRoom3 extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_room', function($table)
        {
            $table->string('unit', 50)->nullable(false)->unsigned(false)->default('null')->change();
            $table->string('number', 50)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_room', function($table)
        {
            $table->integer('unit')->nullable()->unsigned(false)->default(null)->change();
            $table->text('number')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
