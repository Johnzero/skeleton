<?php namespace Zero\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeroCrmBuilding extends Migration
{
    public function up()
    {
        Schema::table('zero_crm_building', function($table)
        {
            $table->integer('country_id')->nullable();
            $table->smallInteger('state_id')->nullable();
            $table->string('name', 255)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zero_crm_building', function($table)
        {
            $table->dropColumn('country_id');
            $table->dropColumn('state_id');
            $table->string('name', 255)->default(null)->change();
        });
    }
}
