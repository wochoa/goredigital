<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewRolasignadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW vistarolasignados as select admin.adm_name as nombres,admin.adm_lastname as apellidos,roles.name as rol,admin.id,adm_estado,depe_id from admin join model_has_roles on(admin.id=model_has_roles.model_id) join roles on(model_has_roles.role_id=roles.id) WHERE (adm_lastname is not null) and(adm_estado=1);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW vistarolasignados");
    }
}
