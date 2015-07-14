            var ajax = function(){
				//buscar valor digitado
                var busca = $('#busProduto').val();
                if(busca != "") {
                    $.ajax({                   
                       url: 'pesquisar.php?',
                       type: 'GET',
                       data: "pesquisa="+busca,
                       dataType: 'json',

                    }).done(function(data){
                        var response = [];
                        response = data;
                        document.getElementById("lista").innerHTML = "";

                        for(i = 0; i < response.length; i++){					

                            document.getElementById("lista").innerHTML += '<div><a href="index.php?pagina=produto&id=' + response[i].id +'"><img style="width:50px;" src="' + response[i].foto + '" />' + response[i].nome +'</a></div>';				
                        }					
                    });      
                }
                else {
                    document.getElementById("lista").innerHTML = "";
                }
            };