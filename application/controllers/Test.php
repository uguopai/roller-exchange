<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends AccountController {
	public function buy(){
		$data = $this->apis->post("account/buy",["base" => "BTC", "symbol" => "ROL", "prices" => "0.000025", "amount" => 9800]);
		print_r($data);
	}

	public function sell(){
		$data = $this->apis->post("account/sell",["base" => "BTC", "symbol" => "ROL", "prices" => "0.000023", "amount" => 9800]);
		print_r($data);
	}
} 