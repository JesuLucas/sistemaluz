<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEntradasSalidasTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_registro' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_empleado' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'fecha' => [
                'type' => 'DATETIME',
            ],
            'hora_entrada' => [
                'type' => 'TIME',
            ],
            'hora_salida' => [
                'type' => 'TIME',
            ]
        ]);

        $this->forge->addKey('id_registro', true);
        $this->forge->addForeignKey('id_empleado', 'empleados', 'id_empleado','CASCADE', 'CASCADE');
        $this->forge->createTable('entradas_salidas');


    }

    public function down()
    {
        //

        $this->forge->dropTable('entradas_salidas');
    }
}
