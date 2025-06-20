<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePuestosTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            
            'id_puesto' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ], 

            'nombre_puesto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

        ]);

        $this->forge->addKey('id_puesto', true);
        $this->forge->createTable('puestos');

    }

    public function down()
    {
        //
        $this->forge->dropTable('puestos');
    }
}
