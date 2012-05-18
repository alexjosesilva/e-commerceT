<?php

/**
 *Classe contato responsavel por controla as requisições do usuaio no formulario 
 */
 
 
class Contato extends Controller {
	
	function __construct() {
		parent::Controller();
	}
	
	
	function index(){
		$dados['titulo'] = 'Fale Conosco';
		
		$query = $this->db->get('categorias');
		$dados['categorias'] = $query->result();
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		$this->load->view('contato');
		$this->load->view('elementos/html_footer');
		
	}
}


?>