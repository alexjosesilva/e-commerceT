<?php

class Produto extends Controller{
	
	
	function __construct(){
		parent::Controller();
     
	}
	
	function detalhe($id){
		$query = $this->db->get('categorias');
		$dados['categorias'] = $query->result();
		
		$dados['titulo'] = 'Catalogo de Produtos | Detalhes do Produto';
		
		$this->db->where('id',$id);
		$query = $this->db->get('produtos');
		$dados['detalhes_produto']=$query->result();
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		$this->load->view('produto_detalhes',$dados);
		$this->load->view('elementos/html_footer');
		
	}
	
	function categoria($id){
		$query 	= $this->db->get('categorias');
		$dados['categorias']= $query->result();
		$dados['titulo']	='Catalogo de produtos | Produtos da Categoria';
		
		$minha_query = "SELECT produtos.*, categorias.nome as nome_categoria FROM produtos JOIN categorias
		ON produtos.categoria = categorias.id WHERE produtos.categoria =".$id;
		
		$query 	= $this->db->query($minha_query);
		$dados['produtos_categoria']= $query->result();
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		$this->load->view('categoria_produtos',$dados);
		$this->load->view('elementos/html_footer');
	}
	
	function busca(){
		$dados['titulo'] = 'Resultados da Busca';
		$query = $this->db->get('produtos');
		$dados['categorias'] = $query->result();
		
		$this->db->like('nome',$this->input->post('busca'));
		$this->db->or_like('descricao', $this->input->post('busca') );
		$this->db->or_like('preco', $this->input->post('preco'));
		
		$query=$this->db->get('produtos');
		$dados['produtos'] = $query->result();
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		
		if(cout($dados['produtos'])>0){
			$this->load->view('produtos_home',$dados);
		}
		else{
			$dados['temp']=$this->input->post('busca');
			$this->load->view('nao_encontrado',$dados);
		}
		$this->load->view('elementos/html_footer');	
	}
	
}//class

?>