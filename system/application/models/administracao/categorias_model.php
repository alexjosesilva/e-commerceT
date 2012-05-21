<?php

    /**
     * Model
     * 
     */
    class Categorias_model extends Model {
        
        function __construct() {
            parent::Model();
        }
        
        
        
        public function cadastrar($data){
            return $this->db->insert('categorias',$data); 
            
        }
        
        
        public function listar(){
            $query = $this->db->get('categorias');
            return $query->result();
        }
        
        /* codigo não esta no livro. deveria esta na paigna 116*/
        function alterar($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get('categorias');
            return $query->result();
            
        }
        
        
        public function gravar_alteracao($data){
            $this->db->where('id',$data[$id]);
            return $this->db->update('categorias',$data);
        }
        
        /* codigo não esta no livro*/
        function excluir($id){
            $this->db->where('id',$id);
            return $this->db->delete('categorias');
        }
    }
    
    

?>
