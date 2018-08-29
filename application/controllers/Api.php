<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends HomeController {
	public $json = [];
	
	public function toJson(){
		header("Content-type: application/json; charset=utf-8");
		print_r(json_encode($this->json));
	}

	public function mywallet(){
		$this->json = $this->apis->post("account/mywallet");
		$this->toJson();
	}

	public function trade($b,$s){
		$this->json = $this->apis->get("market/trade",["trade" => "{$b}/{$s}"]);
		
		$this->toJson();
	}

	public function buy($base,$symbol){
		$this->json = $this->apis->post("account/buy",["base" =>$base, "symbol" => $symbol,"amount" => $this->input->post("amount"),"prices" => $this->input->post("prices")]);
		$this->toJson();
	}

	public function sell($base,$symbol){
		$this->json = $this->apis->post("account/sell",["base" =>$base, "symbol" => $symbol,"amount" => $this->input->post("amount"),"prices" => $this->input->post("prices")]);
		$this->toJson();
	}

	public function chat(){
		$text = $this->input->post("text");
		$this->json = $this->apis->post("public/chat",["text" => $text]);
		$this->toJson();
	}

	public function chart(){
		$arv = [];
		$data = $this->apis->get("market/ohlc",["period" => "15m","base" => $this->session->userdata("base"),"symbol" => $this->session->userdata("symbol"),"limit" => 100]);
		$open = 0;
		foreach ($data as $key => $value) {
			$value->openTime = $value->created * 1000;
			
			$arv[] = [$value->created * 1000, $value->open, $value->high, $value->low, $value->close, $value->volume];

		}
		
		rsort($arv);
		header("Content-type: application/json; charset=utf-8");
		print_r(json_encode($arv));
	}
}
?>