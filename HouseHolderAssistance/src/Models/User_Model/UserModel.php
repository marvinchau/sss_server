<?php


namespace Models\User_Model;

use Database\DAOFactory;
use Database\BasicDAO;
use Utilities\SSSException;


class UserModel{
	
	
	private $dao;
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::USER);
		
	}
	
	public function login(User $user){
		return $this->dao->login($user);
	}
	
	
}