<?php

/**
* Classe que possibilita o gerenciamento de modo fácil e rápida de sessions com php.
*
* @author Francisco Yure <franciscoyurep@gmail.com>
* @since 2015-03-17 0.1
* @version 0.1.1
*
*/
class MySession {

	private $sessExpire;

	public function __construct()
	{
		$this->startSess();
	}

	private function startSess()
	{
		if (!isset($_SESSION))
			session_start();
	}

	public function setSess($sess, $sessValue = null)
	{

		if (is_array($sess) && $sessValue == null) {

			foreach ($sess as $key => $value) {
				$_SESSION[$key] = $value;
			}

		} else if (!is_array($sess) && $sessValue != null) {
			$_SESSION[$sess] = $sessValue;
		}

	}

	public function getSess($sessName)
	{

		if ($this->hasSess($sessName)) {
			$sess = $_SESSION[$sessName];
			return $sess;
		}

		return false;

	}

	public function hasSess($sessName)
	{
		return isset($_SESSION[$sessName]);
	}

	public function unsetSess($sessName)
	{

		if (is_array($sessName)) {

			foreach ($sessName as $key => $value) {
				unset($_SESSION[$key]);
			}

		} else if (!is_array($sessName)) {
			unset($_SESSION[$sessName]);
		}

	}

	public function desploySess()
	{

		unset($_SESSION);
		session_unset();
		session_destroy();

	}

	public function setSessExpire($sessExpire)
	{

		session_write_close();
		$this->sessExpire = $sessExpire;
		session_cache_expire($this->sessExpire);
		$this->startSess();

	}

	public function getAllSess()
	{

		$sess = array();
		foreach ($_SESSION as $key => $value) {
			$sess[$key] = $value;
		}
		return $sess;

	}

}
