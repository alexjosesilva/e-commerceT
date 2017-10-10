
<div id="form-login" >
	
<?php
/**
 * Formulário Login
 * Cap. 10
 * Pag. 137
 */

	echo validation_errors();
	
	echo form_open(base_url().'administracao/home/login');
	
	echo form_fieldset("Efetuar Login");
	
	echo form_label('Login','login');
	echo form_input('login',set_value('login'));
	
	echo form_label('Senha','senha');
	echo form_password('senha',set_value('senha'));
	
	echo form_submit('mysubmit','LOGIN');
	echo form_reset('myreset','CANCELAR');
	
	echo form_fieldset_close();
	
	echo form_close();

?>
	<span> Login: admin </span><br>
	<span> Senha: 123 </span><br>

</div>
