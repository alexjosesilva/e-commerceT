<?php
/**
 * Modelo da Classe Usu�rio
 * Cap.: 10
 * Pag.: 139
 * 
 * Observação: As funções extras: cadastrar, listar, gravar alteração, excluir
 * Não estão no livre foram criadas apartir da classe produto.
 */


	class Usuarios_model extends Model{
		
	  function __construct() {
           parent::Model();           
      }
		
      function login($data){
      	$this->db->where('usuario',$data['login']);
      	$this->db->where('senha',$data['senha']);
      	$query = $this->db->get('usuarios');
      	return $query->result();
      }
      
      function cadastrar($data){
           return $this->db->insert('usuarios',$data);
       }
      
      function listar(){
           $query = $this->db->get('usuarios');
           return $query->result();
       }
      
      function listar_dados_usuario($id){
           $this->db->where('id',$id);
           $query = $this->db->get('usuarios');
           return $query->result();
       }
      
      function gravar_alteracao($data){
        $this->db->where('id',$data['id']);
        return $this->db->update('usuarios',$data);
       }
      
      function excluir($id){
           $this->db->where('id',$id);
           return $this->db->delete('usuarios');
       }
       
      
	} 
	

?>