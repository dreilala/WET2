function cartAction(action,name, price) {
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ name;
			break;
			case "remove":
				queryString = 'action='+action+'&code='+ name;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
			case "refresh":
				queryString = 'action='+action;
			break;
		}
	}
		jQuery.ajax({
		url: "./add_to_cart.php",
		data:queryString,
		type: "POST",
		success:function(data){
			var obj = JSON.parse(data);

			document.getElementById("warenkorb").innerHTML = "Warenkorb: " +obj["sum"];
			console.log(obj);
			for (var prop in obj) {
		  		if (obj.hasOwnProperty(prop)) {
		  // or if (Object.prototype.hasOwnProperty.call(obj,prop)) for safety...
		  				console.log(prop + "-" + name);
						if (prop == name){
								var id = "amount_"+prop.trim();
								console.log(id);
								document.getElementById(id).innerHTML = obj[prop] ;
						}




		  	}
			}
			console.log(name + " - " + price);
			if(typeof price !== "undefined") {
				setPrice(name, price);
			}
			
		}
});
}

function cartRefresh() {

		jQuery.ajax({
		url: "./load_Cart.php",
		type: "POST",
		success:function(data){
			var obj = JSON.parse(data);

			document.getElementById("warenkorb").innerHTML = "Warenkorb: " +obj["sum"];

			for (var prop in obj) {
		  		if (obj.hasOwnProperty(prop)) {
						if (prop!="sum"){

								var id = "amount_"+prop.trim();
								var prod = document.getElementById(id);
								if  (prod) {
									prod.innerHTML = obj[prop];
								}
						}
					}
			}
		}
});
}

$( document ).ready(function() {
    cartRefresh();
});
/*
function getSessVariable($name) {
	var num = 0;
	jQuery.ajax({
		url: "./getSessVariable.php",
		data: "name="+$name,
		type: "POST",
		success:function(data){
			num = data;
		}

	});
	return num;
}
*/

function setPrice(name,price){
	var id = "prod_"+name.trim();
	//var amount = getSessVariable(id);
	jQuery.ajax({
		url: "./getSessVariable.php",
		data: "name="+id,
		type: "POST",
		success:function(data){
			console.log(data);
			var id = "price_"+name.trim();
			document.getElementById(id).innerHTML = price * data;
		}

	});

}
