function buscaNome(especialidade)
  {
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
			option.text = result.especialidade;
			option.value = result.especialidade;
			campoSelect.add(option);
			
        }
      },

      error: function(xhr, status, error) {
        alert(status + error + xhr.responseText);
      }

    });  

  }