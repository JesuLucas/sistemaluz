<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        //

        $this->forge->addField([

            'id_empleado' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],

            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],

            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],

            'id_puesto' => [
                'type' => 'INT',
                'unsigned' => true,
            ],

            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],


                
        ]);

        $this->forge->addKey('id_empleado', true);
        $this->forge->addForeignKey('id_puesto', 'puestos', 'id_puesto', 'CASCADE', 'CASCADE');
        $this->forge->createTable('empleados');

    }

    public function down()
    {
        //

        $this->forge->dropTable('empleados');
    }
}
