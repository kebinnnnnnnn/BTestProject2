<?php

class ContactsController extends Controller {
	
	function __construct($model, $controller, $action){
    
    	session_start();
    	if(!isset($_SESSION['uid'])){

    		header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/users/login');

    	}

        parent::__construct($model, $controller, $action);
       
    }

	public function viewall(){

		$this->set('title','Contacts');
		$fields = array('id','user_id','name','phone_number','address',
								'regist_datetime','update_datetime');
		$columns = array('is_delete','user_id');
		$values = array('0',$_SESSION['uid']);
		$this->set('todo',$this->Contact->selectByCondition($fields,$columns,$values,'update_datetime','DESC'));
		$this->_template->render();

	}
	
	public function add(){

		if (isset($_POST["submit"])){ // there is a request

			$user_id = $_SESSION['uid']; // CHANGE THIS TO SESSION ID!!!
			$name = $_POST['name'];
			$phone_number = $_POST['phone_number'];
			$address = $_POST['address'];

			// do some validation before insertion and stuff

			$columns = array('user_id','name','phone_number','address','is_delete',
								'regist_datetime','update_datetime');
			$values = array($user_id, $name, $phone_number, 
								$address, '0', date('Y-m-d H:i:s'), 
								date('Y-m-d H:i:s'));
			$result = $this->Contact->insert($columns,$values);
			header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/contacts/viewall');
		
		}

		else{ //redirect to the form

			$this->set('title','Add Contact');
			$this->_template->render();
		}

	}

	public function update(){

		if (isset($_POST["submit"])){ // there is a request

			$id = $_POST['id']; // CHANGE THIS TO SESSION ID!!!
			$name = $_POST['name'];
			$phone_number = $_POST['phone_number'];
			$address = $_POST['address'];

			// do some validation before insertion and stuff

			$columns = array('name','phone_number','address', 'update_datetime');
			$values = array($name, $phone_number, $address, date('Y-m-d H:i:s'));
			$result = $this->Contact->update($columns,$values,$id);

			if($result == true){
				header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/contacts/viewall');
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
			$result = $this->Contact->update($columns,$values,$id);
			echo $result;
			if($result == true){
				header('Location: '. 'http://'.DB_HOST.'/'. DOMAIN.'/contacts/viewall');
			}
			else{

			}


		}

		else{


		}

	}

	public function login(){



	}

	public function logout(){


	}
		

}
