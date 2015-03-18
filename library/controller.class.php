<?php
class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	function __construct($model, $controller, $action) {

		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;

		$this->$model = new $model;
		$this->_template = new Template($controller,$action);

		session_start();

	}

	function IsLoggedIn()
	{

		if(!isset($_SESSION["uid"]))
		{

			header('Location: '. 'http://localhost/BTestProject1/users/loginUser');

		}

	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {

		if($this->_action == 'edit' || $this->_action == 'delete')
		{
			header('Location: '. 'http://localhost/BTestProject1/'.$this->_controller.'/viewall');
		}
		else
		{
			$this->_template->render();
		}
	}

}
