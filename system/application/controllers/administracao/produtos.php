<?php
    
/**
 * Controlador Produtos da area de Administração
 * Pagina: 119 Capitulo 9
 */
class Produtos extends Controller {
    
    function __construct() {
        parent::Controller();
        //$this->load->helper('conversor_de_formatos');
        
    }
    
    function index(){
        $data['titulo']="Administração | Produtos";
        
        $this->load->model('administracao/categorias_model');
        $data['categorias'] = $this->categorias_model->listar();
        
        $data['produtos']=$this->listar();       
        
        $this->load->view('administracao/elementos/html_header',$data);
        $this->load->view('administracao/home');
        $this->load->view('administracao/elementos/menu');
        $this->load->view('administracao/produtos',$data);
        $this->load->view('administracao/elementos/html_footer');
    }
    
    
    function cadastrar(){

        
        $this->load->library('form_validation');
        
        $validacoes = array(
            array('field' =>'categoria' ,'label'=>'Categoria','rules'=>'required|min_length[1]' ),
            array('field' =>'nome' ,'label'=>'Nome','rules'=>'required|min_length[5]' ),
            array('field' =>'preco' ,'label'=>'Preco','rules'=>'required|min_length[4]'),
            array('field' =>'descricao' ,'label'=>'Descricao' ,'rules'=>'required|min_length[15]')              
        );
        
        
        $this->form_validatin->set_rules($validacoes);
        
        if($this->form_validatin->run()==FALSE){
            $this->index();
        }
        else{
            $config['upload_path']  ='imgs';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']     = 0;
            $config['max_width']    = 0;
            $config['max_height']   = 0;
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload()){
                echo $this->upload->display_errors();
            }
            else{
                    $arquivo_enviado = $this->upload->data();
                
                    $data['foto']       =   $arquivo_enviado['file_name'];
                    $data['categoria']  =   $this->input->post('categoria');
                    $data['nome']       =   $this->input->post('nome');
                    $data['descricao']  =   $this->input->post('descricao');
                    $data['preco']      =   $this->input->post('preco');
                    //$data['preco']      =   reaisbr_to_decimal($this->input->post('preco'));
                    //helper para conversão de valores em dinheiro
                    
                    
                    
                    $this->load->model('administracao/produtos_model');
                    
                    if( $this->produtos_model->cadastrar($data) ){
                            
                        echo "Sucesso ao Cadastrar Produtos";    
                        $this->index();   
                    }
                    else{
                        echo "Erro ao Cadastrar Produtos";
                    }
                    
                    
            }
                   
        }
        
        
        
        
        
    }
 
    function listar(){
        $this->load->model('administracao/produtos_model');
        return $this->produtos_model->listar();
    }   

    /* metodo alterar cap9 pag128 */
    function alterar($id){
        $data['titulo']="Administração | Alterar Produtos";
        
        $this->load->model('administracao/categorias_model');
        $data['categorias'] = $this->categorias_model->listar();
        
        $data['produtos']=$this->listar();       
        
        $data['dados_produto'] = $this->dados_produto($id);
        
        $this->load->view('administracao/elementos/html_header',$data);
        $this->load->view('administracao/elementos/menu');
        $this->load->view('administracao/produtos',$data);
        $this->load->view('administracao/elementos/html_footer');
    }
    
    
    /* 
     * O metodo que recuperar od dados do produto no controlador
     * Cap 9 Pag129 
    */
    
    private function dados_produto($id){
        $this->load->model('administracao/produtos_model');
        return $this->produtos_model->listar_dados_produto($id);
    }
    
    function gravar_alteração(){
        if($_FILES['userfile']['size']>0){
            $config['upload_path'] = 'imgs';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload',$config);
            
            if($this->upload->do_upload()){
                $foto_antiga = $this->dados_produto($this->input->post('id'));
                unlink('./imgs/'.$foto_antiga[0]->foto);
                $arquivo_enviado = $this->upload->data();
                $data['foto']=$arquivo_enviado['file_name'];
            }
            
        }
    }
    
        
}
    
    
    
    
?>