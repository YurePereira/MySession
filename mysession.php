<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!isset($_SESSION))
	session_start();

/**
 * Classe que possibilita o gerenciamento de modo fácil e rápida de sessions com php.
 *
 * @author Francisco Yure <franciscoyurep@gmail.com>
 * @since 2015-03-17 0.1
 * @version 0.1
 *
 */
class MySession {

	private $session_expire = 30;

	public function __construct()
	{
		session_cache_expire($this->session_expire);
	}

	public function set_sess($sess, $sessValue = null)
	{

		if (is_array($sess) && $sessValue == null) {

			foreach ($sess as $key => $value) {
				$_SESSION[$key] = $value;
			}

		} else if (!is_array($sess) && $sessValue != null) {
			$_SESSION[$sess] = $sessValue;
		}

	}

	public function get_sess($sess_name)
	{

		if ($this->has_sess($sess_name)) {
			$sess = $_SESSION[$sess_name];
			return $sess;
		}

		return false;

	}

	public function has_sess($sess_name)
	{
		return isset($_SESSION[$sess_name]);
	}

	public function unset_sess($sess_name)
	{

		if (is_array($sess_name)) {

			foreach ($sess_name as $key => $value) {
				unset($_SESSION[$key]);
			}

		} else if (!is_array($sess_name)) {
			unset($_SESSION[$sess_name]);
		}

	}

	public function desploy_sess()
	{

		unset($_SESSION);
		session_unset();
		session_destroy();

	}

	public function set_session_expire($session_expire)
	{
		$this->session_expire = $session_expire;
	}

	public function get_all_sess()
	{

		$sess = array();
		foreach ($_SESSION as $key => $value) {
			$sess[$key] = $value;
		}
		return $sess;

	}

}
