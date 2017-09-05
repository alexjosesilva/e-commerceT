<?php
 /*****************************************************************************************************
 *  @name: Home
 *  @author: Alex Jose
 *  @version: 1.0
 *  @package: Controller
 *  @desc: Classe responsável por controlar o que é exibido na página principal do sistema
 *  @since 03/21/2017 
 *************************************************************************************************** */
 
class Home extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index($offset=1)
	{
		$this->load->library('pagination');
		$dados['titulo'] = 'Catalogo de Produtos | Home';
		
		$query = $this->db->get('categorias');
		$dados['categorias'] = $query->result();
		
		//$this->db->order_by("id","random");
				
		$query = $this->db->get('produtos',4,$offset);
		$dados['produtos']=$query->result();

		$config['base_url'] 	= base_url().'home/index/';
		$config['total_rows']	= $this->db->count_all('produtos');
		$config['per_page']	= '4';
		$config['first_link']	= 'Inicio';
		$config['last_link']	= 'Fim';

		$this->pagination->initialize($config);
		$dados['paginas']=$this->pagination->create_links();
		
		
		$this->load->view('elementos/html_header',$dados);
		$this->load->view('elementos/produtos_categorias',$dados);
		$this->load->view('produtos_home',$dados);
		$this->load->view('elementos/html_footer');
		
		
	}
}

/* fim de home.php */
/* Location: ./system/application/controllers/home.php */
