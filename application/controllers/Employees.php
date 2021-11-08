<?php

class Employees extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employeemodel');
    }

        public function index()
        {
            $data['employees'] = $this->Employeemodel->find_all();
            $this->load->view('employees', $data);
        }

        public function create()
        {
            $this->Employeemodel->insert($this->read_form());
            redirect('/employees', 'location');
        }

        public function read($id)
        {
            $employee = $this->Employeemodel->find_one($id);
            if (!isset($employee)) 
            {
                show_404();
            }
            $data['employee'] = $employee;
            $this->load->view('employee', $data);
        }

        public function update($id)
        {
            $this->Employeemodel->update($id, $this->read_form());  
            redirect('/employees', 'location');
        }

        public function delete($id)
        {
            $this->Employeemodel->delete($id);  
            redirect('/employees', 'location');
        }

        private function read_form()
        // The responsibility to obtain the data from a web form belongs inside the controller.
        // That way we keep the model simple.
        {
            return array(
                "name" => $this->input->post('name'),
                "surname1" => $this->input->post('surname1'),
                "surname2" => $this->input->post('surname2'),
                "address" => $this->input->post('address')
            ); 
        }
}