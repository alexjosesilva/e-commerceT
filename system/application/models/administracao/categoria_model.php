<?php

    /**
     * Model
     * 
     */
    class Categoria_model extends Model {
        
        function __construct($argument) {
            parent::Model();
        }
        
        
        
        public function cadastrar($data){
            return $this->db->insert('categorias','data'); 
            
        }
        
        
        public function listar(){
            $query = $this->db->get('categorias');
            return $query->result();
        }
    }
    


?>
