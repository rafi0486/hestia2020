<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Registration extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'reg_id' => array(
                            'type' => 'INT',
                            'constraint' => 9,
                            'unsigned' => TRUE,
                            'null' => FALSE,
                            'auto_increment' => TRUE,
                        ),
                        'event_id' => array(
                            'type' => 'INT',
                            'constraint' => 9,
                            'unsigned' => TRUE,
                            'null' => FALSE,
                        ),
                        'reg_email' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => FALSE,
                        ),
                        'member_email' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => FALSE,
                        ), // TODO Responses from gateway
                ));
                $this->dbforge->add_key('reg_id', TRUE);
                $this->dbforge->create_table('registration');
        }

        public function down()
        {
                $this->dbforge->drop_table('registration');
        }
}