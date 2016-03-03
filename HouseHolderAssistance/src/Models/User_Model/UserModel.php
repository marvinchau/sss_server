<?php


namespace Models\User_Model;

use Database\DAOFactory;
use Database\BasicDAO;
use Utilities\SSSException;
use Database\UserDAO;


class UserModel{
	
	/**
	 * @var UserDAO $dao
	 */
	
	private $dao;
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::USER);
		
	}
	
	public function login(User $user){
		return $this->dao->login($user);
	}
	
	public function add(User $user)
	{
		return $this->dao->add($user);
	}
	
	public function updateStatus(User $user)
	{
		return $this->dao->updateStatus($user);
	}
	
	public function getByType($type)
	{
		return $this->dao->getByType($type);
	}
	
}