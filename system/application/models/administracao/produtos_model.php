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
       
       //cadastrar produtos
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
       
       
   }
   
?>