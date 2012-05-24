<?php
   /**
    * Class para Modelo de Produtos
    * Capitulo 9
    * Página 125
    * 
    */
   class Produtos_model extends Model {
       
       function __construct() {
           parent::Model();           
       }
       
       /* cadastrar produtos
        * cap 9 Pag 122
        * Não valida a gravação de produtos existente
        * ou seja po sistema ainda não proibe cadastrar o mesmo produto duas vezes!
        */
       function cadastrar($data){
           return $this->db->insert('produtos',$data);
       }
       
       //listar os produtos cadastrados
       function listar(){
           $query = $this->db->get('produtos');
           return $query->result();
       }
       
       function listar_dados_produto($id){
           $this->db->where('id',$id);
           $query = $this->db->get('produtos');
           return $query->result();
       }
       
       function excluir($id){
           $this->db->where('id',$id);
           return $this->db->delete('produtos');
       }
       
      
        /* Código funcionando perfeitamente
         * 24.05.2012
         */
       function gravar_alteracao($data){
        $this->db->where('id',$data['id']);
        return $this->db->update('produtos',$data);
    }
       
   }
   
?>