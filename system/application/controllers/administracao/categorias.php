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
            
            $this->load->view('administracao/elementos/html_header',$data);
            $this->load->view('administracao/elementos/menu');
            $this->load->view('administracao/categorias');
            $this->load->view('administracao/elementos/html_footer');
      }
           
  }
   
  
?>