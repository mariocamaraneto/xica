var fornecedorSelecionado = [];
var fornecedoresRespostasAJAX = [];
var total = 0;

// document.getElementById("total").innerHTML = "R$ 2,00";

$('#valorTotal').text("R$ 0,00");
var produtos = null;

function insereProdutoTabela(produto) {

	var novaLinha = "<tr>";

	novaLinha += "<td>" + produto.referencia + "</td>";
	novaLinha += "<td>" + produto.nome + "</td>";
	novaLinha += "<td>" + numeroParaDinheiro(produto.custo_bruto) + "</td>";

	novaLinha += "</tr>";

	$('#listaDeProdutos').append(novaLinha);
}

$('#pesquisaFornecedorForm').on('submit', function(e) {
	pesquisaAjax();
	return false;
});

function pesquisaAjax() {
	var palavraPesquisa = $('#palavraPesquisaFornecedor').val();
	
	if(palavraPesquisa == ''){
		alert("Por favor, digite o nome da fornecedora");
		return;
	}
	else if (palavraPesquisa.length <= 2) {
		alert("Pesquisa com poucas letras\nPor favor, digite mais sobre a fornecedora");
		return;
	}

	$.ajax({
		url : "/pagamentos/searchFornecedores.json?search=" + palavraPesquisa,
		dataType : "json",
		success : function(data) {
			fornecedoresRespostasAJAX = data.fornecedores;
			mostraOpcoes(data.fornecedores);
		}
	});

}

function mostraOpcoes(fornecedores) {
	$('#myModal').show();
	// retira elementos de janelas anteriores
	$('#listaDeForncedoresModal').html('');
	// apresenta
	for (var i = 0; i < fornecedores.length; i++) {
		var novaLinha = "<tr id='" + i + "'>";

		novaLinha += "<td>" + fornecedores[i].nome + "</td>";
		novaLinha += "<td>" + fornecedores[i].telefone + "</td>";

		novaLinha += "</tr>";

		$('#listaDeForncedoresModal').append(novaLinha);
	}
	// Adiciona evento de click para elementos recem criados
	$('#listaDeForncedoresModal tr').on('click', selecionaOpcao);
}

function selecionaOpcao() {
	// identifica qual item foi clicado -> obs.: id de nome em html, despreze o
	// json agora
	var indice = $(this).closest('tr').attr('id');

	// set a variavel global com o json do fornecedor selecionado
	fornecedorSelecionado = fornecedoresRespostasAJAX[indice];
	
	//função responsavel 
	buscaProdutosAPagar();

	// escreve o nome do cliente na caixa de pesquisa
	$("#palavraPesquisaFornecedor").val(fornecedorSelecionado.nome)

//	// fecha a janela com opções
	$('#myModal').hide();
};


function buscaProdutosAPagar(){
	$.ajax({
		url : "/pagamentos/searchProdutosAPagar.json?search=" + fornecedorSelecionado.id,
		dataType: 'json',
		success: function (data){
			var total=0;
			for( var i=0; i<data.produtos.length; i++){
				insereProdutoTabela(data.produtos[i]);
				total += data.produtos[i].custo_bruto;
			}
			$("#valorTotal").text(numeroParaDinheiro(total));
		}
		
	});
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