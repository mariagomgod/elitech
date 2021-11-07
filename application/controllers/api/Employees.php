<?php

class Employees extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employeemodel');
    }

    public function getEmployee($id)
    {
        $employee = $this->Employeemodel->find_one($id);
        if (!isset($employee)) 
        {
            return $this->json_response(404, array('message' => 'Not Found'));
        }
        return $this->json_response(200, $employee);
    }

    private function json_response($status_code, $response_body)
    {
        return $this->output
                ->set_content_type('application/json')
                ->set_status_header($status_code)
                ->set_output(json_encode($response_body));
    }
}
