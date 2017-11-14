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
			option.text = result.nome;
			option.value = result.nome;
			campoSelect.add(option);
			
        }
      },

      error: function(xhr, status, error) {
        alert(status + error + xhr.responseText);
      }

    });  

  }
  
  function buscaEndereco(cep)
  {
    $.ajax({

      url: 'php/buscaEndereco.php',
      type: 'POST',
      async: true,
      dataType: 'json',
      data: {'cep':cep},         

      success: function(result) {
      
        
        if (result != "")
        {                  
          document.forms[0]["logradouro"].value    = result.logradouro;
          document.forms[0]["numero"].value = result.numero;
          document.forms[0]["bairro"].value = result.bairro;
        }
      },

      error: function(xhr, status, error) {
        alert(status + error + xhr.responseText);
      }

    });  
  }