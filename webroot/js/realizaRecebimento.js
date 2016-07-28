var parcelasRespostaAJAX = [];
var clientesRespostasAJAX = [];
var total = 0;

$('#valorTotal').text("R$ 0,00");
var produtos = null;

$('#valor').keypress(function() {
	$('#valor').maskMoney();
});

$('#pagamentoForm').on('submit', function(){
	var valorPagamento = $('#valor').maskMoney('unmasked')[0]; 
	if(valorPagamento > total){
		alert("Pagamento superior ao total");
		return false;
	}
})

//############  INICIO - PESQUISA CLIENTE  ##########################
$('#pesquisaClienteForm').on('submit', function(e) {
	pesquisaAjax();
	return false;
})

function pesquisaAjax() {
	var palavraPesquisa = $('#palavraPesquisaCliente').val();
	
	if(palavraPesquisa == ''){
		alert("Por favor, digite o nome do cliente");
		return;
	}
	else if (palavraPesquisa.length <= 2) {
		alert("Pesquisa com poucas letras\nPor favor, digite mais sobre o cliente");
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
	
	//CHAMA O PROCESSO PARA RECUPERAR PARCELAS
	recuperaParcelas(clientesRespostasAJAX[indice].id);
	
	//seta o valor do input com o codigo do cliente -> (input invisivel por padrao)
	$('#idcliente').val(clientesRespostasAJAX[indice].id);

	$('#palavraPesquisaCliente').val(clientesRespostasAJAX[indice].nome)
	
	// fecha a janela com opções de clientes
	$('#myModal').hide();
	
};
//############ FIM - PESQUISA CLIENTE  ##########################



//############ INCIO - MANIPULAÇÂO PARCELAS  ##########################
function recuperaParcelas(id){
	$.ajax({
		url: "/parcelas/parcelasPorCliente.json?search="+id,
		dataType: 'json',
		success: function (data) {
			parcelasRespostaAJAX = data.parcelas;
			insereParcelasTabela();
		}
	});
}

function insereParcelasTabela() {
	//apaga o que tiver na tela
	$('#listaDeParcelas').html('');
	
	for (i in parcelasRespostaAJAX){
		var novaLinha = "<tr>";
		novaLinha += "<td>" + $.format.date(parcelasRespostaAJAX[i].venda.data, "dd/MM/yyyy HH:mm")  + "</td>";
		novaLinha += "<td>" + $.format.date(parcelasRespostaAJAX[i].data_vencimento, "dd/MM/yyyy")  + "</td>";
		
		//verifica se ja houve pagamento parcial da parcela
		var valorFormatado = numeroParaDinheiro(parcelasRespostaAJAX[i].valor_total);
		if(parcelasRespostaAJAX[i].valor_pago){
			valorFormatado += " - ";
			valorFormatado += numeroParaDinheiro(parcelasRespostaAJAX[i].valor_pago);
			valorFormatado += " = ";
			valorFormatado += numeroParaDinheiro(parcelasRespostaAJAX[i].valor_total - parcelasRespostaAJAX[i].valor_pago);
		}
		novaLinha += "<td>" + valorFormatado + "</td>";
		
		novaLinha += "<td>" + parcelasRespostaAJAX[i].num_parcela+"/"+parcelasRespostaAJAX[i].venda.numero_parcelas + "</td>";
		novaLinha += "</tr>";
		
		$('#listaDeParcelas').append(novaLinha);
	}
	
	atualizaTotal();
}
//############ FIM - MANIPULAÇÂO PARCELAS  ##########################





function atualizaTotal() {
	total = 0;
	for ( i in parcelasRespostaAJAX) {
		total += (parcelasRespostaAJAX[i].valor_total - parcelasRespostaAJAX[i].valor_pago);
	}
	$('#valorTotal').text(numeroParaDinheiro(total));
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