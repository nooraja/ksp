<!DOCTYPE html>
<html lang="en">
<head>
	<title>Auto</title>
	<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.js"></script>
	<script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/easyautocomplete/easy-autocomplete.min.css"><link rel="stylesheet" href="<?php echo base_url();?>assets/js/easyautocomplete/easy-autocomplete.themes.min.css"> 

	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
</head>
<body>

	<table>
		<tr>
			<td><input id="provider-json" /></td>
			<td><input id="data-holder"/></td>
		</tr>
	</table>



<script type="text/javascript">

	var options = {
		//url: "<?php echo base_url();?>js/countries.json",
		url: "<?php echo base_url();?>datos/getdatos",
		
		getValue: "ciudad",
		
		theme:"blue-light",

		// template: {
		// 	type: "description",
		// 	fields: {
		// 		description: "cantHabit"
		// 	}
		// },

		template: {
			type: "custom",
			method: function(value, item) {
				return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
			}
		},

		// template: {
		// 	type: "iconLeft",
		// 	fields: {
		// 		iconSrc: "img"
		// 	}
		// },

		list: {
			maxNumberOfElements: 5,
			match: {
				enabled: true
			},
			// onClickEvent: function(value, item) {
			// 	alert('seleccionado');
			// },
			onClickEvent: function() {
				var value = $("#provider-json").getSelectedItemData().ciudad;

				$("#data-holder").val(value).trigger("change");
			},
			onKeyEnterEvent: function(){
				var value = $("#provider-json").getSelectedItemData().idCiudad;

				$("#data-holder").val(value).trigger("change");
			}
		}
	};
	$("#provider-json").easyAutocomplete(options);
</script>
</body>
</html>