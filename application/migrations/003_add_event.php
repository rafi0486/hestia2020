<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Event extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'event_id' => array(
                            'type' => 'INT',
                            'constraint' => 9,
                            'unsigned' => TRUE,
                            'null' => FALSE,
                            'auto_increment' => TRUE,
                        ),
                        'cat_id' => array(
                            'type' => 'INT',
                            'constraint' => 9,
                            'unsigned' => TRUE,
                            'null' => FALSE,
                        ),
                        'title' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => FALSE,
                            'unique' => TRUE,
                        ),
                        'short_desc' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                        ),
                        'details' => array(
                            'type' => 'text',
                            'null' => FALSE,
                        ),
                        'venue' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ),
                        'prize' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '10',
                        ),
                        'co1_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                        ),
                        'co1_no' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => FALSE,
                        ),
                        'co2_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                        ),
                        'co2_no' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => FALSE,
                        ),
                        'seats' => array(
                            'type' => 'INT',
                            'constraint' => '10',
                        ),
                        'reg_start' => array(
                            'type' => 'DATETIME',
                        ),
                        'reg_end' => array(
                            'type' => 'DATETIME',
                        ),
                        'username' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '10',
                            'null' => FALSE,
                            'unique' => TRUE,
                        ),
                        'pswd' => array(
                            'type' => 'CHAR',
                            'constraint' => '60',
                            'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('event_id', TRUE);
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (`cat_id`) REFERENCES categories(`cat_id`)');
                $this->dbforge->create_table('events');
        }

        public function down()
        {
                $this->dbforge->drop_table('events');
        }
}