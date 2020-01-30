<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* 
CREATE TABLE `fest`.`users` ( 
    `user_id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(10) NOT NULL , 
    `fullname` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `phone` VARCHAR(20) NULL , 
    `college` VARCHAR(100) NULL DEFAULT NULL , 
    `verified` BOOLEAN NOT NULL , 
    `banned` BOOLEAN NOT NULL , 
    `pswd` CHAR(60) NOT NULL ,
    PRIMARY KEY (`user_id`), 
    UNIQUE (`username`), 
    UNIQUE (`email`), 
    UNIQUE (`phone`));
*/
class Migration_Add_User extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'fullname' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                        ),
                        'email' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE,
                            'unique' => TRUE,
                        ),
                        'client_id' => array(
                            'type' => 'CHAR',
                            'constraint' => '60',
                            'null' => FALSE,
                            'unique' => TRUE,
                        ),
                        'phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                            'unique' => TRUE,
                        ),
                        'college' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => TRUE,
                            'default' => NULL,
                        ),
                        'verified' => array(
                            'type' => 'BOOLEAN',
                            'null' => FALSE,
                            'default' => FALSE,
                        ),
                        'banned' => array(
                            'type' => 'BOOLEAN',
                            'null' => FALSE,
                            'default' => FALSE,
                        ),
                        'pswd' => array(
                            'type' => 'CHAR',
                            'constraint' => '60',
                            'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('email', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}