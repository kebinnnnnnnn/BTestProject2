<?php

class UsersController extends Controller {

	
	function index()
	{



	}


	function view($id = null,$name = null) 
	{
		$this->set('title',$name.' - Users');
	}
	
	
	function viewall() 
	{
		$this->IsLoggedIn();
		$this->set('uid',$_SESSION["uid"]);
		$this->set('userType',$_SESSION["type"]);

		if($_SESSION["type"] == 'author')
		{

			header('Location: '. 'http://localhost/BTestProject1/posts/viewall');

		}

		$this->set('title','Users');
		$this->set('todo',$this->User->selectAll());
	}
	
	function addUser()
	{
		
		if(isset($_SESSION["uid"]))
		{

			header('Location: '. 'http://localhost/BTestProject1/posts/viewall');

		}
		$this->set('title', 'Register');

	}

	function editUser()
	{
		$this->IsLoggedIn();
		if($_SESSION["type"] == 'author')
		{

			header('Location: '. 'http://localhost/BTestProject1/posts/viewall');
			
		}
		$this->set('title', 'Edit User');

	}

	function loginUser()
	{

		if(isset($_SESSION["uid"]))
		{

			header('Location: '. 'http://localhost/BTestProject1/posts/viewall');

		}
		$this->set('title', 'Login');

	}

	/* actual CRUD*/ 
	
	function add() 
	{

		$email_address = $_POST['email_address'];
		$password  = md5($_POST['password']);
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];

		$this->set('title','Success - Feed');

		$columns = array('email_address','password','first_name','middle_name','last_name','address','contact_number','regist_datetime', 'update_datetime','type');
		$values = array($email_address,$password,$first_name,$middle_name,$last_name,$address,$contact_number, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), 'author');

		$this->set('title', 'Result');

		$result = $this->User->insert($columns,$values);
		
		if(((bool)$result) == true)
		{

			$columns = array('email_address', 'password');
			$values = array($email_address,$password);

			$resultt = $this->User->selectByCondition($columns,$values);
			if(count($resultt) == 1)
			{

				 $_SESSION["uid"] = $resultt[0]['User']['id'];
				 $_SESSION["type"] = $resultt[0]['User']['type'];

				 header('Location: '. 'http://localhost/BTestProject1/posts/viewall');

			}

		}

		else
		{

			 header('Location: '. 'http://localhost/BTestProject1/users/addUser');

		}


		$this->set('todo', $result);



	}
	
	

	function edit()
	{

		$id = $_POST['id'];
		$email_address = $_POST['email_address'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];

		$columns = array('email_address','first_name','middle_name','last_name','address','contact_number', 'update_datetime','type');
		$values = array($email_address,$first_name,$middle_name,$last_name,$address,$contact_number, date('Y-m-d H:i:s'), 'author');

		$this->set('title', 'Result');
		$this->set('todo', $this->User->update($columns,$values, $id));	

	}

	function delete($id = null) 
	{
		$id = $_POST['id'];
		$this->set('title','Success -Feed');
		$this->set('todo',  $this->User->deleteById($id));	
	}

	function login()
	{


		$email_address = $_POST['email_address'];
		$password  = md5($_POST['password']);


		$columns = array('email_address', 'password');
		$values = array($email_address,$password);

		$this->set('title','');
		$result = $this->User->selectByCondition($columns,$values);
		if(count($result) == 1)
		{

			 $_SESSION["uid"] = $result[0]['User']['id'];
			 $_SESSION["type"] = $result[0]['User']['type'];

			 header('Location: '. 'http://localhost/BTestProject1/posts/viewall');

		}

		else
		{

			header('Location: '. 'http://localhost/BTestProject1/users/loginUser');

		}

	}

	function logout()
	{

		session_start();
		session_unset(); 
		session_destroy(); 

		header('Location: '. 'http://localhost/BTestProject1/users/loginUser');

	}

}
