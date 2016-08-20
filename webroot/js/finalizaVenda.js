//VARIAVEIS DE CONTROLE
//clientes no formato json da resposta da requisição ajax
var clientesRespostasAJAX =[]
//recupera o valor total da venda
var subtotalVenda = dinheiroParaNumero( $('#valorTotal').text() );

//VARIAVEIS QUE SERÂO ENVIADAS PARA SERVIDOR
//aramazena o cliente da venda no formato json assim como recebido do servidor
var clienteSelecionado = null;
//armazena o valor de desconto
var descontoVenda = 0;
//armazena a forma de pagamento efetuada
var formaPagamento = $( "#formaPagamento" ).val();
//armazena o número de parcelas se for a prazo, senão 0
var numero_parcelas = 0;

$("#formaPagamento" ).change( function () {
	formaPagamento = $( "#formaPagamento" ).val();
	
	if( $('#formaPagamento').val() == 'Prazo' ){
		$('#parcelas').show();
		numero_parcelas = 1;
	} 
	else{
		$('#parcelas').hide();
		numero_parcelas = 0;
	}
});

$("#numeroparcelas").change(function(){
	numero_parcelas = $("#numeroparcelas").val();
});


$('#pesquisaClienteForm').on('submit', function(e) {
	pesquisaAjax();
	return false;
});

$('#descontoForm').on('submit', function(e){
	return false;
});

$("#removerCliente").on('click', function(){
	//Remove o cliente selecionado 
	clienteSelecionado = null;
	//Muda nome no input
	$("#palavraPesquisaCliente").val('');
	$(this).hide();
});

$('#valorDesconto').maskMoney('mask', 0.00);

$('#valorDesconto').on('keyup', function() {
	
	$('#valorDesconto').maskMoney();
	console.debug($('#valorDesconto').val());
	descontoVenda = parseFloat($(this).val());
	var valorAtualizado = subtotalVenda - descontoVenda;
	$('#valorTotal').text( numeroParaDinheiro(valorAtualizado) );
});


function pesquisaAjax() {
	var palavraPesquisa = $('#palavraPesquisaCliente').val();
	
	if(palavraPesquisa == ''){
		alert("Por favor, digite o nome do cliente");
		return;
	}
	else if (palavraPesquisa.length <= 2) {
		alert("Pesquisa com poucas letras\nPor favor, digite mais letras do nome do cliente");
		return;
	}

	$.ajax({
		url : "/clientes.json?search=" + palavraPesquisa,
		dataType : "json",
		success : function(data) {
			clientesRespostasAJAX = data.clientes;
			mostraOpcoes(data.clientes);
		}
	});
}


function mostraOpcoes(clientes) {
	$('#myModal').show();
	// retira elementos de janelas anteriores
	$('#listaDeClientesModal').html('');
	// apresenta
	for (var i = 0; i < clientes.length; i++) {
		var novaLinha = "<tr id='" + i + "'>";

		novaLinha += "<td>" + clientes[i].nome + "</td>";
		novaLinha += "<td>" + clientes[i].telefone + "</td>";

		novaLinha += "</tr>";

		$('#listaDeClientesModal').append(novaLinha);
	}
	// Adiciona evento de click para elementos recem criados
	$('#listaDeClientesModal tr').on('click', selecionaOpcao);
}


function selecionaOpcao() {
	// identifica qual item foi clicado -> obs.: id de nome em html, despreze o
	// json agora
	var indice = $(this).closest('tr').attr('id');

	// insere o cliente na variavel global
	clienteSelecionado = clientesRespostasAJAX[indice];
	
	//Muda nome no input
	$("#palavraPesquisaCliente").val(clienteSelecionado.nome);

	// fecha a janela com opções
	$('#myModal').hide();
	
	//habilita o botão remover cliente
	$("#removerCliente").show();
};


//Codigo do Botão para enviar requisição para concluir venda com 'post' e redirecionamento 
$("#concluiVenda").on("click", concluiVenda)

function concluiVenda() {
	//se é a prazo e não tem cliente selecionado
	if(numero_parcelas && (!clienteSelecionado)){
		alert("Selecione um cliente.");
		return;
	}
	var dadosAJAX = new Object();
	dadosAJAX.cliente = JSON.stringify(clienteSelecionado);
	dadosAJAX.desconto = descontoVenda;
	dadosAJAX.formaPagamento = formaPagamento;
	dadosAJAX.numeroParcelas =  numero_parcelas;

	$.redirect("/vendas/conclui",dadosAJAX);

}


// converte uma entrada no padrão monetário para número
function dinheiroParaNumero(valor) {
	valor = valor.replace("R$", "");
	valor = valor.replace(",", ".");
	return parseFloat(valor);
}

// converte um número para o padrão monetário
function numeroParaDinheiro(numero) {
	numero = numero.toFixed(2);
	var preco = "R$" + numero;
	return preco.replace(".", ",");
}

$('#fecharModal').on('click', function fecharModal(){
//	// fecha a janela com opções
	$('#myModal').hide();
});

$('#formaPagamento').change(function (){
		if( $('#formaPagamento').val() == 'Prazo' ){
			$('#parcelas').show();
		} 
		else{
			$('#parcelas').hide();
		}
	}
);