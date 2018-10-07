var OK;
var rowcount;

var tax = 0.0875;
var ship_fee = 4.99;

function init() {	

	rowcount = document.getElementById('rownum').value;
	
	var handle = document.personal_info.elements["item"];  
	var handle2 = document.personal_info.elements["quantity"];  
	handle[0].focus();
	
	var numbers = /[0-9]/; //for number search
	
	//Check for items selected
    document.getElementById('submit').addEventListener('click', function() {
		var handle = document.personal_info.elements["item"];  
		var handle2 = document.personal_info.elements["quantity"];
		var choices="";		
		var i;
		for(i=0; i < handle.length; i++) {
			if(handle[i].checked){
				order_num_good=true;
				choices += handle[i].value + " ";
				if(handle2[i].value=="0" || handle2[i].value=="" || isNaN(Number(handle2[i].value))){
					order_good=false;
					order_num_good=false;
					handle[i].focus();		
					handle2[i].focus();
					handle2[i].style.border = "5px solid red";
					alert("You did not enter a VALID quantity for "+handle[i].value);
					break;
				}
				else{
					order_good=true;
					handle2[i].style.border = "1px solid grey";
					handle2[i].style.borderRadius = "3px";
					handle2[i].style.padding = "1px";
				}
			}
		}
	    if(choices.length == 0) {
			alert("You didn't select any items");
            order_good=false; 
			document.getElementById('items').style.border = "2px solid red";
			handle[0].focus();				
        }
		else{
			document.getElementById('items').style.border = "2px solid blue";
		}
	}, false);	
	
     
}	

function Avail(x){
	var check = document.personal_info.elements["item"]; 
	var qitem = "qitem"+x;
	if(check[x].checked){
		document.getElementById(qitem).removeAttribute('readOnly');
	}
	else{
		var q = "qitem"+x;
		document.getElementById(qitem).setAttribute('readOnly','readonly');
		document.getElementById(q).value="0";
		itemPrice(x);
	}
}

//Find total price per item and final total
	function itemPrice(x){
		var finalprice = 0;
		var q = "qitem"+x;
		var p = "pitem"+x;
		var t = "titem"+x;
		var c = "citem"+x;
		var ct = "ctitem"+x;
		var quantity = document.getElementById(q).value;
		if(!isNaN(Number(quantity))){
			var price = document.getElementById(p).value;
			var cprice = document.getElementById(c).value;
			var itemtotal = quantity * price;
			var citemtotal = quantity * cprice;
			document.getElementById(t).value=itemtotal.toFixed(2);
			document.getElementById(ct).value=citemtotal.toFixed(2);
			
			//add up all retail for final total
			for(var y=0;y<rowcount;y++){
				var tempiprice = "titem"+y;
			
				if(document.getElementById(tempiprice).value != 0){
					finalprice = parseFloat(document.getElementById(tempiprice).value) + finalprice;
				}
	
			}
			
			document.getElementById('stotal').value=finalprice.toFixed(2);
			document.getElementById('ttax').value=(finalprice*tax).toFixed(2);
			finalprice = (finalprice*(1+tax))+ship_fee;
			document.getElementById('tprice').value=finalprice.toFixed(2);
		}
		else{
			document.getElementById(q).value="0";
			itemPrice(x);
		}
	}
	



    
	
	

	