

//document.getElementById("total").innerHTML = "R$ 2,00";

$('#valorTotal').text("R$ 3,00");

function novoProduto(){
	
	var novaLinha = "<tr>";

	novaLinha += "<td>Ref. X </td>";
	novaLinha += "<td>nome produto</td>";
	novaLinha += "<td>R$ 0,00</td>";

	novaLinha += '<td> <button class="button alert tiny round" onclick="removeProduto(this)" type="button">Remover</button> </td>';
	
	novaLinha += "</tr>";
	
	$('#listaDeProdutos').append(novaLinha);
}

function removeProduto(handler) {
    var tr = $(handler).closest('tr');

    tr.fadeOut(400, function(){ 
      tr.remove(); 
    });

    return false;
};

novoProduto();
novoProduto();


//$.ajax({
//	url: "http://localhost/xica/produtos.json?search=camiseta",
//	dataType: "json",
//	success: function (data){
//		alert(data.produtos.toSource());
//		}
//});
