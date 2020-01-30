<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Cat extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'cat_id' => array(
                            'type' => 'INT',
                            'constraint' => 9,
                            'unsigned' => TRUE,
                            'null' => FALSE,
                            'auto_increment' => TRUE,
                        ),
                        'cat_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => FALSE,
                            'unique' => TRUE,
                        ),
                        'username' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                            'unique' => TRUE,
                        ),
                        'pswd' => array(
                            'type' => 'CHAR',
                            'constraint' => '60',
                            'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('cat_id', TRUE);
                $this->dbforge->create_table('categories');
        }

        public function down()
        {
                $this->dbforge->drop_table('categories');
        }
}