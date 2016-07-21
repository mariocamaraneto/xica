jQuery(function($) {
	// Códigos jQuery a serem executados quando a página carregar

	
	
	// fade out flash 'success' messages
	$('.message.error, .message.success').delay(3500).slideUp(1300);

	//Mascaras usadas no sistema
	$('#data-nasc').mask("99/99/9999", {placeholder:"dd/mm/aaaa"});
	$('#cpf').mask("999.999.999-99", {placeholder:"000.000.000-00"})



	
	
	
	
	
	
	
	
});