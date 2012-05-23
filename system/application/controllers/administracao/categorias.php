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
      }//index
      
     function adicionar(){
          
          $this->load->library('form_validation');
      
      $config = array(
        array(
            'field' => 'nome',
        'label' => 'Nome',
        'rules' =>  'required|min_length[4]|max_length[20]'
    ),
    array(
        'field' => 'descricao',
        'label' => 'Descrição',
        'rules' =>  'required|min_length[10]|max_length[200]|htmlspecialchars' 
       )    
      
      );
      
      
      $this->form_validation->set_rules($config);
      
      if($this->form_validation->run()==FALSE){
          $this->index();
      }
      else{
          $data['nome'] = $this->input->post('nome');
      $data['descricao'] = $this->input->post('descricao');
                  
      $this->load->model('administracao/categorias_model');
      
      if($this->categorias_model->cadastrar($data)){
         
          echo "Sucesso ao inserir categoria";
          $this->index();
      }
      else {
          echo "Erro ao inserir categoria";
              }
          }            
          
      }//adicionar
      
     /* Alterar categoria: 9.4 pag 116 */
     function alterar($id){
           $data['titulo'] = "Administracao | Alterar Categorias";
       
            $this->load->model('administracao/categorias_model');
    $data['dados_categoria'] = $this->categorias_model->alterar($id);
       
            
            $this->load->view('administracao/elementos/html_header',$data);
    $this->load->view('administracao/elementos/menu');
    $this->load->view('administracao/alterar_categoria',$data);
    $this->load->view('administracao/elementos/html_footer');
      }//alterar
            
     function gravar_alteracao(){
           $this->load->library('form_validation');
      
      $config = array(
        array(
            'field' => 'nome',
        'label' => 'Nome',
        'rules' =>  'required|min_length[4]|max_length[20]'
    ),
    array(
        'field' => 'descricao',
        'label' => 'Descricao',
        'rules' =>  'required|min_length[20]|max_length[200]|htmlspecialchars' 
           )    
          
          );
          
          
          $this->form_validation->set_rules($config);
       
          if($this->form_validation->run()==FALSE){
             $this->alterar($this->input->post('id'));
      }
      else{
          $data['id'] = $this->input->post('id');
      $data['nome'] = $this->input->post('nome');
      $data['descricao'] = $this->input->post('descricao');
      
      
      $this->load->model('administracao/categorias_model');
      
      if($this->categorias_model->gravar_alteracao($data)){
          redirect(base_url().'administracao/categorias/','refresh');
      }
      else {
          echo "Erro ao alterar categoria";
              }
      }
     }//gravar alteracao
              
    function excluir($id){
        
        $this->load->model('administracao/categorias_model');
        if($this->categorias_model->excluir($id)){
            redirect(base_url().'administracao/categorias/', 'refresh');
        }
        else{
            echo "Erro ao excluir categoria";
        }
    }//excluir            
         
     }          
  
?>