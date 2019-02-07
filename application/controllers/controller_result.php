<?php

class Controller_Result extends Controller
{

	function __construct()
	{
		$this->model = new Model_Result();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('result_view.php', 'template_view.php', $data);
	}
	
}