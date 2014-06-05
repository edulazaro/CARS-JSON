	
	//Only to make the call of the function easier
	function cars_form(container,dest,param){
					var str="./cars_form.php?container=";
					str += container+"&dest="+dest;	
					str += "&param="+param;	
					$("#"+container).load(str);
		}