<?php

class Employees extends CI_Controller {

        public function index()
        {
            $this->load->model('employee');
            $data['employees'] = $this->employee->find_all();
            $this->load->view('employees', $data);
        }

        public function create()
        {

        }

        public function read($id)
        {
            
        }

        public function update($id)
        {
            
        }

        public function delete($id)
        {
            
        }
}