zz<?php
/*
 * Controlador da area de administração do site
 */

class Home extends Controller {
	
	function __construct(){
		parent::Controller();
	}
	
	function index() {
		$data['titulo']="Administração | Home";
        
		$this->load->view('administracao/elementos/html_header',$data);
		$this->load->view('administracao/home');
        $this->load->view('administracao/elementos/menu');
		$this->load->view('administracao/elementos/html_footer');
	}
	
}


?>