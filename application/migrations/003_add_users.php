<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

        public function up()
        {
                $data = array(
                        array('id' => 1, 'username' => 'mgg84@outlook.com', 'password' => '$2y$10$bM/ehTY7BIuEQOqBWO56oOeeNLYBs5jF28aH3HezRoXFsrZe19M0.')
                     );
                     $this->db->insert_batch('users', $data);
        }

        public function down()
        {
                $this->db->empty_table('users');
        }
}