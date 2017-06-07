

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
	alert(data);
	console.log(data);
	console.log([]);
	document.getElementById("warenkorb").innerHTML = "Warenkorb: " +data["sum"];

	for (var prop in data) {

  if (data.hasOwnProperty(prop)) {
  // or if (Object.prototype.hasOwnProperty.call(obj,prop)) for safety...

  }}
}
});
}
