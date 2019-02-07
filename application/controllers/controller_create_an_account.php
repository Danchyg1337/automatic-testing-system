<?php

class Controller_Create_an_account extends Controller
{
	
	function __construct()
	{
		$this->model = new Model_Create_an_account();
		$this->view =  new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('create_an_account_view.php','template_view.php', $data);
	}
	
}