<?php

class Migrate extends CI_Controller
{

        public function index()
        {
                $this->load->library('migration');
                echo "Current Version:";
                print_r($this->migration->current());
                if ($this->migration->current() === FALSE)
                {  
                    echo "Migrating";
                    show_error($this->migration->error_string());
                }
        }

}