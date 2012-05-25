<?php

/*
 * ControladorCarrinho
 * Cap 11
 * Pag 144 e 145
 * Desc: os dados são enviados pelo formulario e adicionado a sessão do usuario
 *       No Carrinho é usado uma bibiliteca chamda Cart.php encontrada library/Cart.php
 *       responsavel pela maioria das ações do carrinho.
 * index Cap 11 e pag 145
 */

class Carrinho extends Controller {
	
	
	function __construct() {
		parent::Controller();
	}
	
	function index(){
		//$this->load->helper('conversor_de_formatos');
		
		$query = $this->db->get('categorias');
		$dados['categorias'] = $query->result();
		$dados['titulo']="Catálogo de Produtos | Carrinho de Compras";
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		$this->load->view('carrinho');
		$this->load->view('elementos/html_footer');
	}
	
	function adicionar(){
		$data = array(
			'id'	=>	$this->input->post('id'),
			'qty'	=>	$this->input->post('qty'),
			'price'	=>	$this->input->post('price'),
			'name'	=>	$this->input->post('name')
		);
		$this->cart->insert($data);
		redirect(base_url().'produtos/detalhe/'.$this->input->post('id'),'refresh');
	}
	
	function atualizar(){
		$this->cart->update($_POST);
		$this->index();
	}

	
}


?>