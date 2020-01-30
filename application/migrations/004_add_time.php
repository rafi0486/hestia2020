<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Time extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                    'event_id' => array(
                        'type' => 'INT',
                        'constraint' => 9,
                        'unsigned' => TRUE,
                        'null' => FALSE,
                    ),
                    'start_time' => array(
                        'type' => 'DATETIME',
                    ),
                    'end_time' => array(
                        'type' => 'DATETIME',
                    ),
                    'label' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => FALSE,
                    ),
                ));
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (`event_id`) REFERENCES events(`event_id`)');
                $this->dbforge->create_table('time');
        }

        public function down()
        {
                $this->dbforge->drop_table('time');
        }
}