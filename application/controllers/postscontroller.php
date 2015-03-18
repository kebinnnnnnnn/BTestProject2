<?php

class PostsController extends Controller {


	function view($id = null,$name = null) 
	{
		$this->set('title',$name.' - Feed');
		//$this->set('todo',$this->Item->select($id));

	}

	function viewall() 
	{
		$this->IsLoggedIn();
		$this->set('title','Feed');
		$this->set('uid',$_SESSION["uid"]);
		$this->set('userType',$_SESSION["type"]);
		$this->set('todo',$this->Post->selectAllWithWhere('updated_datetime', 'DESC'));
	}

	/* redirects to creating, editing etc  */ 

	function addPost()
	{
		$this->IsLoggedIn();
		$this->set('title', 'Create Post');

	}

	function editPost()
	{
		$this->IsLoggedIn();
		$this->set('title', 'Edit Post');

	}

	/* actual CRUD*/ 
	
	function add() 
	{

		$title = $_POST['title'];
		$description = $_POST['description'];

		$this->set('title','Success - Feed');

		$columns = array('user_id','title','body','created_datetime', 'updated_datetime');
		$values = array($_SESSION["uid"],$title, $description, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));

		$this->set('title', 'Result');
		$this->set('todo', $this->Post->insert($columns,$values));	
	}
	
	

	function edit()
	{

		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];

		$columns = array('user_id','title','body', 'updated_datetime');
		$values = array($_SESSION["uid"],$title, $description, date('Y-m-d H:i:s'));


		$this->set('title', 'Result');
		$this->set('todo', $this->Post->update($columns,$values, $id));	

	}

	function delete($id = null) 
	{
		$id = $_POST['id'];
		$this->set('title','Success -Feed');
		$this->set('todo',  $this->Post->deleteById($id));	
	}



}
