

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

$( document ).ready(function() {
		console.log( "document loaded" );
});
