var produtosSelecionados = [];
var produtosRespostasAJAX = [];
var total = 0;

// document.getElementById("total").innerHTML = "R$ 2,00";

$('#valorTotal').text("R$ 0,00");
var produtos = null;

function insereProdutoTabelaSelecionados(produto) {

	var novaLinha = "<tr>";

	novaLinha += "<td>" + produto.referencia + "</td>";
	novaLinha += "<td>" + produto.nome + "</td>";
	novaLinha += "<td>" + numeroParaDinheiro(produto.preco) + "</td>";

	novaLinha += '<td> <button class="button alert tiny round" onclick="removeProdutoTabelaSelecionados(this,'
			+ produto.id + ')" type="button">Remover</button> </td>';

	novaLinha += "</tr>";

	$('#listaDeProdutos').append(novaLinha);

	atualizaTotal();
}

function removeProdutoTabelaSelecionados(identificador, prodID) {
	var tr = $(identificador).closest('tr');

	tr.fadeOut(400, function() {
		tr.remove();
	});

	for (var i = 0; i < produtosSelecionados.length; i++) {
		if (produtosSelecionados[i].id == prodID) {
			produtosSelecionados.splice(i, 1);
			break;
		}
	}

	atualizaTotal();

	return false;
};

$('#pesquisaProdutoForm').on('submit', function(e) {
	e.preventDefault();
	pesquisaAjax();
	return false;
})

function pesquisaAjax() {
	var palavraPesquisa = $('#palavraPesquisaProduto').val();
	
	if(palavraPesquisa == ''){
		alert("Por favor, digite o nome do produto");
		return;
	}
	else if (palavraPesquisa.length <= 2) {
		alert("Pesquisa com poucas letras\nPor favor, digite mais sobre o produto");
		return;
	}

	$.ajax({
		url : "http://localhost/xica/produtos.json?search=" + palavraPesquisa,
		dataType : "json",
		success : function(data) {
			produtosRespostasAJAX = data.produtos;
			console.log(produtosRespostasAJAX);
			mostraOpcoes(data.produtos);
		}
	});

}

function mostraOpcoes(produtos) {
	$('#myModal').show();
	// retira elementos de janelas anteriores
	$('#listaDeProdutosModal').html('');
	// apresenta
	for (var i = 0; i < produtos.length; i++) {
		var novaLinha = "<tr id='" + i + "'>";

		novaLinha += "<td>" + produtos[i].referencia + "</td>";
		novaLinha += "<td>" + produtos[i].nome + "</td>";
		novaLinha += "<td>" + numeroParaDinheiro(produtos[i].preco) + "</td>";

		novaLinha += "</tr>";

		$('#listaDeProdutosModal').append(novaLinha);
	}
	// Adiciona evento de click para elementos recem criados
	$('#listaDeProdutosModal tr').on('click', selecionaOpcao);
}

function selecionaOpcao() {
	// identifica qual item foi clicado -> obs.: id de nome em html, despreze o
	// json agora
	var indice = $(this).closest('tr').attr('id');

	// insere o produto na lista de produtos
	produtosSelecionados.push(produtosRespostasAJAX[indice]);

	// insere o produto na janela principal de vendas
	insereProdutoTabelaSelecionados(produtosRespostasAJAX[indice]);

//	// fecha a janela com opções
	$('#myModal').hide();
};

function atualizaTotal() {
	total = 0;
	for (var i = 0; i < produtosSelecionados.length; i++) {
		total += produtosSelecionados[i].preco;
	}
	$('#valorTotal').text(numeroParaDinheiro(total));
}

// converte uma entrada no padrão monetário para número
function dinheiroParaNumero(valor) {
	valor = valor.replace("R$ ", "");
	valor = valor.replace(",", ".");
	return parseFloat(valor);
}

// converte um número para o padrão monetário
function numeroParaDinheiro(numero) {
	numero = numero.toFixed(2);
	var preco = "R$ " + numero;
	return preco.replace(".", ",");
}

function finalizaVenda() {

	var dadosAJAX = new Object();
	dadosAJAX.produtos = JSON.stringify(produtosSelecionados);
	dadosAJAX.total = total;
	
	$.redirect("http://localhost/xica/vendas/finaliza",dadosAJAX);

}

$('#fecharModal').on('click', function fecharModal(){
//	// fecha a janela com opções
	$('#myModal').hide();
});