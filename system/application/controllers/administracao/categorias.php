<?php
  
  /**
   * controlador de categorias
   */
   
  class Categorias extends Controller {
      
      function __construct() {
            parent::Controller();
      }
      
      
      function index(){
            $data['titulo'] = "Administracao | Categorias";
       
            $this->load->model('administracao/categorias_model');
            $data['categorias'] = $this->categorias_model->listar();
       
            
            $this->load->view('administracao/elementos/html_header',$data);
            $this->load->view('administracao/elementos/menu');
            $this->load->view('administracao/categorias',$data);
            $this->load->view('administracao/elementos/html_footer');
      }
      
      function adicionar(){
          
          $this->load->libray('form_validation');
          
          $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' =>  'required|min_length[4]|max_length[20]'
            ),
            array(
                'field' => 'descicao',
                'label' => 'Descricao',
                'rules' =>  'required|min_length[20]|max_length[100]|htmlspecialchars' 
           )    
          
          );
          
          
          $this->form_validation->set_rules($config);
          
          if($this->form_validation->run()==FALSE){
              $this->index();
          }
          else{
              $data['nome'] = $this->input->post('nome');
              $data['descricao'] = $this->input->post('descricao');
              $data['permissao'] = $this->input->post('permissao');
              
              $this->load->model('administracao/categorias_model');
              
              if($this->categorias_model->cadastrar($data)){
                  $this->index();
              }
              else {
                  echo "Erro ao inserir categoria";
              }
          }            
          
      }
      
           
  }
   
  
?>