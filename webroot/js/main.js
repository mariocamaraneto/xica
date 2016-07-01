
//Espera a página carregar e após 3,5 segundos esconde a mensagem de erro ou sucesso
$(document).ready(function() {
  // fade out flash 'success' messages
  $('.message.error, .message.success').delay(3500).slideUp(1300);
});