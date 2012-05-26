<?php
  
  /**
   * Controlador da class Usuarios
   * Autor Alex Jose
   */
  class Usuarios extends Controller {
      
      function __construct() {
          parent::Controller();
          
      }
      
      function index(){
        $data['titulo']="Administração | Usuarios";
        $this->load->model('administracao/usuarios_model');

        $data['usuarios'] = $this->usuarios_model->listar();
             
        
        $this->load->view('administracao/elementos/html_header',$data);
        $this->load->view('administracao/elementos/menu');
        $this->load->view('administracao/usuarios',$data);
        $this->load->view('administracao/elementos/html_footer');
    }
    
    /**
     * Metodo Cadastra Usuario
     * Autor Alex Jose
     */
    function cadastrar(){

        
        $this->load->library('form_validation');
        
        $validacoes = array(
            array('field' =>'nome' ,'label'=>'Nome','rules'=>'required|min_length[5]' ),
            array('field' =>'usuario' ,'label'=>'tipo de usuario','rules'=>'required|min_length[5]' ),
            array('field' =>'email' ,'label'=>'email','rules'=>'required|email'),
            array('field' =>'telefone' ,'label'=>'telefone' ,'rules'=>'required|min_length[10]'),
            array('field' =>'senha' ,'label'=>'senha','rules'=>'required|password|min_length[5]' ),
            array('field' =>'senhaconfirmar' ,'label'=>'senha confirma','rules'=>'required|password|min_length[5]' ),                         
        );
        
        
        $this->form_validation->set_rules($validacoes);
        
        if($this->form_validation->run()==FALSE){
            $this->index();
        }
        else{
            /* no futuro inserir um avatar aqui*/
            
                    $data['nome']       =   $this->input->post('nome');
                    $data['usuario']    =   $this->input->post('usuario');
                    $data['email']      =   $this->input->post('email');
                    $data['telefone']   =   $this->input->post('telefone');
                    $data['senha']      =   $this->input->post('senha');
                                  
                    $this->load->model('administracao/usuarios_model');
                    
                    if( $this->usuarios_model->cadastrar($data) ){
                            
                        echo "Sucesso ao Cadastrar Usuarios";    
                        $this->index();   
                    }
                    else{
                        echo "Erro ao Cadastrar Usuarios";
                    }
                    
                    
            }
                   
        }
        
 
    /* Listar usuarios cadastrados */
    function listar(){
        $this->load->model('administracao/usuarios_model');
        return $this->usuarios_model->listar();
    }   

    /* metodo alterar usuario */
    function alterar($id){
        
        $data['titulo']="Administração | Alterar Usuarios";
        $this->load->model('administracao/usuarios_model');
        $data['usuarios'] = $this->usuarios_model->listar();
        
        $data['usuarios']=$this->listar();       
        $data['dados_usuario'] = $this->dados_usuario($id); 
              
        $this->load->view('administracao/elementos/html_header',$data);
        $this->load->view('administracao/elementos/menu');
        $this->load->view('administracao/alterar_usuario',$data);
        $this->load->view('administracao/elementos/html_footer');
    }
    
    
    /* 
     * O metodo que recuperar od dados do produto no controlador
     * Cap 9 Pag129 
    */
    
     function dados_usuario($id){
        $this->load->model('administracao/usuarios_model');
        return $this->usuarios_model->listar_dados_usuario($id);
    }
    
    /*
     * Metodo para gravar alteracao
     * Cap 9 Pag 131 
     */
    function gravar_alteracao(){
        
              
        $this->load->library('form_validation');
        
         $validacoes = array(
            array('field' =>'nome' ,'label'=>'Nome','rules'=>'required|min_length[5]' ),
            array('field' =>'usuario' ,'label'=>'tipo de usuario','rules'=>'required|min_length[5]' ),
            array('field' =>'email' ,'label'=>'email','rules'=>'required|email'),
            array('field' =>'telefone' ,'label'=>'telefone' ,'rules'=>'required|min_length[15]'),
            array('field' =>'senha' ,'label'=>'senha','rules'=>'required|password|min_length[5]' ),
            array('field' =>'senhaconfirmar' ,'label'=>'senha confirma','rules'=>'required|password|min_length[5]' ),                         
        );
        
        
        $this->form_validation->set_rules($validacoes);
        
        if($this->form_validation->run()==FALSE){
            $this->alterar($this->input->post('id'));
        }
        else{
                $data['nome']       =   $this->input->post('nome');
                $data['usuario']    =   $this->input->post('usuario');
                $data['email']      =   $this->input->post('email');
                $data['telefone']   =   $this->input->post('telefone');
                $data['senha']      =   $this->input->post('senha');
                                  
                $this->load->model('administracao/usuarios_model');
            
          if($this->usuarios_model->gravar_alteracao($data)){
                echo "Sucesso ao alterar usuario";    
                $this->index();
            }
            else{
                echo "Erro ao alterar usuario";
            }
            
        }
        
        
    }//gravar alteracao
    
    /*
     * Metodo de Excluir
     * Cap 9 Pag 133
     */
    
    function excluir($id){
       
       $this->load->model('administracao/usuarios_model');
            
       if($this->usuarios_model->excluir($id)){
                echo "Sucesso ao excluir Usuario";    
                $this->index();
       }
        else{
                echo "Erro ao excluir Usuario";
        }   
    }//excluir
    
      
  }
  
  
  
?>