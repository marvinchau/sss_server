<?php

namespace Utilities;

use Utilities\SessionTimeoutException;

class Session
{

	private static $_timeoutDuration = 1800;

	public static function startSession(){

		if(!session_id())
		{
			session_start();
			$_SESSION['lastAction'] = date('Y-m-d H:i:s');
		}

	}

	public static function stopSession()
	{

		if(session_id())
		{
			session_unset($_SESSION);
			session_destroy();
		}
	}

	public static function getSession($key)
	{
		try{
			Session::checkSessionTimeout();
		}
		catch(SessionTimeoutException $ste)
		{
			throw $ste;
		}

		return $_SESSION[$key];
	}

	public static function setSession($key, $value)
	{
		try{
			Session::checkSessionTimeout();
		}
		catch(SessionTimeoutException $ste)
		{
			throw $ste;
		}

		$_SESSION[$key] = $value;

	}

	public static function checkSession($key)
	{
		if(session_id()){
			return isset($_SESSION[$key]);
		}else
		{
			return false;
		}

	}

	private static function checkSessionTimeout()
	{
		if (isset($_SESSION['lastAction']) && (time() - strtotime($_SESSION['lastAction']) > SESSION::$_timeoutDuration)) {

			throw new SessionTimeoutException("Session Timeout");
		}
		$_SESSION['lastAction'] = date('Y-m-d H:i:s');
	}

}