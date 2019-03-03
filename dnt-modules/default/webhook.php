<?php
class defaultAbstractModulController{
	
	public function run(){
		$rest = new Rest;
		$rest->loadDefault();
	}
}

defaultAbstractModulController::run();