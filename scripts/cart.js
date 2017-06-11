

function cartAction(action,name) {
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

			for (var prop in obj) {
		  		if (obj.hasOwnProperty(prop)) {
		  // or if (Object.prototype.hasOwnProperty.call(obj,prop)) for safety...

						if (prop!="sum"){

								var id = "amount_"+prop.trim();
								document.getElementById(id).innerHTML = obj[prop] ;
						}




		  	}
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
function getSessVariable($name) {
	var num = 0;
	var that=this;
	jQuery.ajax({
		url: "./getSessVariable.php",
		data: "name="+$name,
		type: "POST",
		success:function(data){
			that.num = data;
		}

	});
	return that.num;
}

function setPrice(name,price){
	var id = "prod_"+name.trim();
	var amount = getSessVariable(id);

		console.log(amount);
	var id = "price_"+name.trim();
	document.getElementById(id).innerHTML = price * amount ;
}
