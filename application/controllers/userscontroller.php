<?php

class UsersController extends Controller {
	
	function __construct($model, $controller, $action){
    
    	session_start();
    	if($action == "login" && isset($_SESSION['uid']) && !empty($_SESSION['uid']) ){ //trying to access login page

    		header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/viewall');

    	}
    	else if($action != "login" && !isset($_SESSION['uid'])){ //not logged in

    		header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/login');

    	}
    	else if(isset($_SESSION['type']) && !empty($_SESSION['type']) && $_SESSION['type'] == 'user' && $action != "info" &&  $action != "updateSelf"){ //not an admin

    		header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/contacts/viewall');

    	}
        parent::__construct($model, $controller, $action);
       
    }

	public function viewall(){

		$this->set('title','Users');
		$fields = array('id','email_address','password','first_name',
								'middle_name','last_name','address','contact_number',
								'type','is_delete','regist_datetime', 'update_datetime');
		$columns = array('is_delete');
		$values = array('0');
		$this->set('todo',$this->User->selectByCondition($fields,$columns,$values,'update_datetime','DESC'));
		$this->_template->render();

	}
	
	public function add(){
		
		if (isset($_POST["submit"])){ // there is a request

			$email_address = $_POST['email_address'];
			$password  = md5($_POST['password']);
			$first_name = $_POST['first_name'];
			$middle_name = $_POST['middle_name'];
			$last_name = $_POST['last_name'];
			$address = $_POST['address'];
			$contact_number = $_POST['contact_number'];
			$type = $_POST['type'];

			// do some validation before insertion and stuff

			$columns = array('email_address','password','first_name',
								'middle_name','last_name','address','contact_number',
								'type','is_delete','regist_datetime', 'update_datetime');
			$values = array($email_address,$password,$first_name,
								$middle_name,$last_name,$address,$contact_number,
								$type,'0',date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			$result = $this->User->insert($columns,$values);
			header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/contacts/viewall');
		
		}

		else{ //redirect to the form

			$this->set('title','Register');
			$this->_template->render();
		}

	}

	public function updateSelf()
	{

		$this->set('title','Update');
		$this->_template->render();

	}

	public function update(){

		if (isset($_POST["submit"])){ // there is a request

			$id = $_POST['id'];
			$email_address = $_POST['email_address'];
			$first_name = $_POST['first_name'];
			$middle_name = $_POST['middle_name'];
			$last_name = $_POST['last_name'];
			$address = $_POST['address'];
			$contact_number = $_POST['contact_number'];
			$type = $_POST['type'];

			// do some validation before insertion and stuff

			$columns = array('email_address','first_name',
								'middle_name','last_name','address','contact_number',
								'type', 'update_datetime');
			$values = array($email_address,$first_name,
								$middle_name,$last_name,$address,$contact_number,
								$type, date('Y-m-d H:i:s'));
			$result = $this->User->update($columns,$values,$id);

			if($result == true){

				$_SESSION['email_address'] = trim($email_address);
				$_SESSION['first_name'] = trim($first_name);
				$_SESSION['middle_name'] = trim($middle_name);
				$_SESSION['last_name'] = trim($last_name);
				$_SESSION['address'] = trim($address);
				$_SESSION['contact_number'] = trim($contact_number);
				$_SESSION['type'] = trim($type);

				header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/viewall');
			}
			else{

			}

		}

		else if(isset($_POST["edit"])){ //redirect to the form

			$this->set('title','Update');
			$this->_template->render();

		}

	}

	public function delete(){

		if (isset($_POST["submit"])){ // there is a request

			$id = $_POST['id'];

			// do some validation before insertion and stuff

			$columns = array('is_delete');
			$values = array('1');
			$result = $this->User->update($columns,$values,$id);
			echo $result;
			if($result == true){
				header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/viewall');
			}

			else{

			}


		}

		else{


		}

	}

	public function info(){

		$this->set('title','Info');
		$this->_template->render();

	}

	public function login(){

		if(isset($_POST['login'])){

			$email_address = $_POST['email_address'];
			$password  = md5($_POST['password']);
			$fields = array('id','email_address','first_name','middle_name','last_name','address','contact_number','type');
			$columns = array('email_address', 'password');
			$values = array($email_address,$password);
			$this->set('title','');
			$result = $this->User->selectByCondition($fields,$columns,$values);

			if(count($result) == 1){

				 $_SESSION["uid"] = $result[0]['User']['id'];
				 $_SESSION["email_address"] = $result[0]['User']['email_address'];
				 $_SESSION["first_name"] = $result[0]['User']['first_name'];
				 $_SESSION["middle_name"] = $result[0]['User']['middle_name'];
				 $_SESSION["last_name"] = $result[0]['User']['last_name'];
				 $_SESSION["address"] = $result[0]['User']['address'];
				 $_SESSION["contact_number"] = $result[0]['User']['contact_number'];
				 $_SESSION["type"] = $result[0]['User']['type'];				
				 header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/contacts/viewall');

			}

			else{

				header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/login');

			}

		}

		else{ //redirect to the form

			$this->set('title','Login');
			$this->_template->render();
		}

	}

	public function logout(){


		session_destroy(); 
		header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/login');

	}
		

}
