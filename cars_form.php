<?php 

session_start();
?>	
	
	<script type="text/javascript">
	//First we declare the arrays and then obtain the JSON from the get_json.php file
	var array_make= new Array();
	var array_model= new Array();
	var array_submodel=new Array();
	var dataJson;
	$.ajax({

	
			type: "POST",
			url:"get_json.php",
			async: true,
			
			success: function(datos){
				dataJson = eval(datos);

				for(var i in dataJson){

					 //We put the data in the first menu
					 

						var existe=false;
						for(var x=0; x<array_make.length; x++){
								if(array_make[x]==dataJson[i].MAKE){
									existe=true; 
								}
						}						
								
						if(existe==false){
								array_make.push(dataJson[i].MAKE);
								//alert(array_make[array_make.length-1]); 
								$('#form_make').append('<option value="'+dataJson[i].MAKE+'" >'+dataJson[i].MAKE+'</option>');								
						}
						
						

										 
					 
				}
			},

			error: function (obj, error, objError){

				//if there is an error

			}

	});	

	</script>



	<div id="content">
		<div id="content_header" >
			Fill in your details on the form below
		</div>
		
		<form id="form_cars" method="<?php echo($_GET['param']); ?>" action="<?php echo($_GET['dest']); ?>"  >		
			<div class="form_header_text">
				Vehicle Make
			</div>
			<SELECT id="form_make" name="form_make" size="1"  class="car_form_field" >
					<OPTION  selected VALUE= "0"> - Select - </OPTION>	
			</SELECT>
			<div class="form_header_text">
				Vehicle Model
			</div>		
			<SELECT id="form_model" name="form_model" size="1"  class="car_form_field">
					<OPTION  selected VALUE= "0"> - Select - </OPTION>	
		
			</SELECT>
			<div class="form_header_text">
				Vehicle Sub-Model
			</div>		
			<SELECT id="form_derivate" name="form_derivate" size="1"  class="car_form_field" >
					<OPTION  selected VALUE= "0"> - Select - </OPTION>	

			</SELECT>	
			<input id="form_button"  type="submit"  value="Continue">		</input>			
		</form>		
	</div>	


	<script language="javascript">
						
		$("#form_make").change(function(evento){
				 //We reset and put the data in the second menu
				$('#form_model').html('');
				$("#form_model").length = 0;
				$('#form_model').children().remove().end().append('<option selected value="0">- Select -</option>') ;
				$('#form_derivate').html('');
				$("#form_derivate").length = 0;
				$('#form_derivate').children().remove().end().append('<option selected value="0">- Select -</option>') ;				
				array_model= [];
				
				
				for(var i in dataJson){
						
						var existe=false;
						if( $('#form_make').val()==dataJson[i].MAKE ){

								//Check in order to no repeat elements
								for(var x=0; x<array_model.length; x++){
										if(array_model[x]==dataJson[i].MODEL){
											existe=true; 
										}
								}						
										
								if(existe==false){
										array_model.push(dataJson[i].MODEL);
										//alert(array_model[array_model.length-1]); 
										$('#form_model').append('<option value="'+dataJson[i].MODEL+'" >'+dataJson[i].MODEL+'</option>');								
							}					
						}					 
				}				
		});
		
		


		$("#form_model").change(function(evento){
				 //We reset and put the data in the third menu
				$('#form_derivate').html('');
				$("#form_derivate").length = 0;
				$('#form_derivate').children().remove().end().append('<option selected value="0">- Select -</option>') ;				
				array_submodel= [];
				
				
				for(var i in dataJson){
						
						var existe=false;
						if( ($('#form_make').val()==dataJson[i].MAKE) &&  ($('#form_model').val()==dataJson[i].MODEL) ){

								//Check in order to no repeat elements
								for(var x=0; x<array_submodel.length; x++){
										if(array_submodel[x]==dataJson[i].DERIVATE){
											existe=true; 
										}
								}						
										
								if(existe==false){
										array_submodel.push(dataJson[i].DERIVATE);
										//alert(array_submodel[array_submodel.length-1]); 
										$('#form_derivate').append('<option value="'+dataJson[i].DERIVATE+'" >'+dataJson[i].DERIVATE+'</option>');								
							}					
						}					 
				}				
		});		

	</script>


