<?php

/**
 *Classe contato responsavel por controla as requisições do usuaio no formulario 
 */
 
 
class Contato extends Controller {
	
	public function __construct() {
		parent::Controller();
	}
	
	
	public function index(){
		$dados['titulo'] = 'Fale Conosco';
		
		$query = $this->db->get('categorias');
		$dados['categorias'] = $query->result();
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		$this->load->view('contato');
		$this->load->view('elementos/html_footer');
		
	}
	
	public function enviar(){
		$this->load->library('form_validation');
		
		$config = array(
			array(
				'field'	=>	'nome',
				'label'	=>	'Nome',
				'rules'	=>	'required|min_length[4]|max_length[20]'
			),
			array(
				'field'	=>	'email',
				'label'	=>	'Email',
				'rules'	=>	'required|trim|valid_email'
			),
			array(
				'field'	=>	'mensagem',
				'label'	=>	'Mensagem',
				'rules'	=>	'required|min_length[10]|max_length[400]|htmlspecialchars'
			)
		);
		
		
		$this->form_validation->set_message('required','O campo %s é requerido.');
		$this->form_validation->set_message('valid_email','O campo %s deve conter um email valido.');
		$this->form_validation->set_message('min_length','O campo %s deve conter pelo menos %s caracteres.');
		$this->form_validation->set_message('max_length','O campo %s deve conter no máximo %s caracteres.');
		
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run()==false){ 
			$this->index();
		}
		else{
			
			$nome = $this->input->post('nome');
			$email = $this->input->post('email');
			$mensagem = $this->input->post('mensagem'); 
						
			/*Carregar as bibliteca de validação de email*/
			$this->load->library('email');
			
			$this->email->from($email,$nome);
			$this->email->to('turmawb@gmail.com');
			$this->email->subject('Contato encaminhado polo website');
			$this->email->message($mensagem);
			
			
			$this->email->send();
			
			$dados['titulo'] = 'Fale Conosco';
			
			$query = $this->db->get('categorias');
			$dados['categorias'] = $query->result();
			
			$this->load->view('elementos/html_header',$dados);
			$this->load->view('elementos/produtos_categorias',$dados);
			$this->load->view('sucesso');
			$this->load->view('elementos/html_footer');
		}
		
	}
}


?>