<?php

class UserController extends Controller {

	function render() {
		$template = new Template;
		echo $template->render('login.htm');
	}

	function console_log($data) {
		echo '<script>';
		echo 'console.log(' . json_encode($data) . ')';
		echo '</script>';
	}

	function beforeroute() {
	}

	function authenticate() {

		$username = $this->f3->get('POST.username');
		$password = $this->f3->get('POST.password');

		$user = new User($this->db);
		$user->getByName($username);

		if ($user->dry()) {
			$this->console_log('elo2');
			$this->f3->reroute('/login');
		}

		if (password_verify($password, $user->get(password))) {
			$this->f3->set('SESSION.user', $user->username);
			$this->console_log('MAMY TO');
			$this->f3->reroute('/');

		} else {
			$this->console_log(password_hash($password, PASSWORD_DEFAULT));
			$this->console_log($user->password);
			$this->console_log('elo');
			$this->f3->reroute('/login');
		}
	}
}