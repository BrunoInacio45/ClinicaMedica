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