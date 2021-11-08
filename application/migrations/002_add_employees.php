<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_employees extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ),
                        'surname1' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ),
                        'surname2' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ),
                        'address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('employees');
        }

        public function down()
        {
                $this->dbforge->drop_table('employees');
        }
}