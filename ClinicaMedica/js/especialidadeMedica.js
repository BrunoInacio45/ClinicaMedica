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
			option.text = result[i].nome ;
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
  
  function buscaHorario(data,nomeEsp)
  {
	
   var dados =  {
      'data':data,
      'nomeEsp':nomeEsp
   };    
     
	 
    $.ajax({

      url: 'php/buscaHorario.php',
      type: 'POST',
      async: true,
      dataType: 'json',
      data: dados,         

      success: function(result) {
      
        
        if (result != "")
        {                  
			$("#horario").empty(); 
			var cont = 0;
			var horario = 8;
                        var horarioS;
			var indisponivel = false;
                        var hr = [];

			while(horario<18){
                             indisponivel = false;
                             for(var i in result){
                                 if(horario == result[i].horario)
                                     indisponivel = true;
                             }
                             
                             if(!indisponivel){
                                  var campoSelect = document.getElementById("horario");
                                  var option =document.createElement("option");
                                  option.text = horario + ":00";
                                  option.value = horario;         
                                  campoSelect.add(option);
                             }
                             
                             horario++;
                        }
                                    		
			
        }
        else{
                $("#horario").empty();  
                for(var a=8;a<18;a++){
                        var campoSelect = document.getElementById("horario");
                        var option =document.createElement("option");
                        option.text = a + ":00";
                        option.value = a;         
                        campoSelect.add(option);
                }
        }
      },

      error: function(xhr, status, error) {
        alert(status + error + xhr.responseText);
      }

    });  

  }