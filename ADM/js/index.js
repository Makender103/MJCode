$(document).ready(function(){
	
	$('#delete').click(function(){
		if(confirm("Are you sure you want to delete this ?")){

            $.ajax({
                url : 'funcoes.php',
                type : 'GET',
                dataType : 'html',
                success : function(code_html, statut){ // success est toujours en place, bien sûr !
                    alert('SUCESS')
                },

                error : function(resultat, statut, erreur){
                        alert('ERROR')
                }
                
            })
        }
	})
		

})





