<?php
/**
 * Modelo da Classe Usuário
 * Cap.: 10
 * Pag.: 139
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
      
	} 
	

?>