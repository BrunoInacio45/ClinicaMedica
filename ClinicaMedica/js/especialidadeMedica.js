function buscaNome(especialidade)
{
 $("#nomeEsp").empty();  

$.ajax({

  url: 'php/buscaNomes.php',
  type: 'POST',
  async: true,
  dataType: 'json',
  data: {'especialidade':especialidade},         

  success: function(result) {


    if (result != "")
    {                  
		for(var i in result){	
			var campoSelect = document.getElementById("nomeEsp");
			var option = document.createElement("option");
			option.text = result[i].nome;
			option.value = result[i].nome;
			campoSelect.add(option);
		}
    }
  },

  error: function(xhr, status, error) {
    alert(status + error + xhr.responseText);
  }

});  

}
  
  function buscaHorario(data)
  {
	$("#horario").empty();  
	  
    $.ajax({

      url: 'php/buscaHorario.php',
      type: 'POST',
      async: true,
      dataType: 'json',
      data: {'dataConsulta':dataConsulta},         

      success: function(result) {
      
        
        if (result != "")
        {                  
			for(var i in result){	
			var campoSelect = document.getElementById("horario");
			var option = document.createElement("option");
			option.text = result[i].horario;
			option.value = result[i].horario;
			campoSelect.add(option);
		}
			
        }
      },

      error: function(xhr, status, error) {
        alert(status + error + xhr.responseText);
      }

    });  

  }