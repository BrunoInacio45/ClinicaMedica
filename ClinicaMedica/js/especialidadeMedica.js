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
        var campoSelect = document.getElementById("nomeEsp");
        var option = document.createElement("option");
        option.text = result.nome;
        option.value = result.id;
        campoSelect.add(option);

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
      data: {'data':data},         

      success: function(result) {
      
        
        if (result != "")
        {                  
			var campoSelect = document.getElementById("horario");
			var option = document.createElement("option");
			option.text = result.horario;
			option.value = result.horario;
			campoSelect.add(option);
			
        }
      },

      error: function(xhr, status, error) {
        alert(status + error + xhr.responseText);
      }

    });  

  }