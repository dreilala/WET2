

function cartAction(action,name) {
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ name+'&quantity='+$("#qty_"+name).val();
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
url: "add_to_cart.php",
data:queryString,
type: "POST",
datatype:"json",
success:function(data){
	var obj = JSON.parse(data);
	alert(obj["sum"]);

	document.getElementById("warenkorb").innerHTML = "Warenkorb: " +obj["sum"];

	for (var prop in obj) {
  		if (obj.hasOwnProperty(prop)) {
  // or if (Object.prototype.hasOwnProperty.call(obj,prop)) for safety...

				if (prop!="sum"){

						alert("amount_"+prop);
						$("amount_"+prop).val(obj[prop]);
						$("amount_"+prop).attr("style","display:inline;");
				}




  	}
	}
}
});
}
