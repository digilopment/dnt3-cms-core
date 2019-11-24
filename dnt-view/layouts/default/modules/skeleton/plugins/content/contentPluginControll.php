<?php

class contentPluginControll extends Plugin{
	
	public function run(){
		$data = $this->data;
		$this->layout(__FILE__ , 'tpl');
	}
	
}
