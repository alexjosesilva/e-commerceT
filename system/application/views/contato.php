


<?php

echo "<div id='form-contato'>";
  
echo validation_errors();
  
echo form_open(base_url().'contato/enviar');
	echo form_fieldset("Fale Conosco");
	
	echo form_label('Informa o seu nome','nome');
	echo form_input('nome',set_value('nome'));
	
	echo form_label('Informe o seu email','email');
	echo form_input('email',set_value('email'));
	
	echo form_label('Mensagem','mensagem');
	echo form_textarea('mensage',set_value('mensagem'));

	echo form_submit('Enviar','Enviar');
	echo form_reset('cancelar','Cancelar');

echo form_close();

echo "</div>";  
?>


