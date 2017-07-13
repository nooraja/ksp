<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
	<title>Test Hitungan</title>
	<script type="text/javascript">
		$(document).ready(function (e) {
			$("input").change(function () {
				var toplam = 0;
					$("input[name=ngehe]").each(function () {
						toplam = toplam + parseInt($(this).val());
					})
					$("input[name=hasil]").val(toplam);
			});
		});
	</script>
</head>
<body>
	<input type="text" name="ngehe" value="0"> </br>
	<input type="text" name="ngehe" value="0"> </br>
	<input type="text" name="ngehe" value="0"> </br>
	<input type="text" name="ngehe" value="0"> </br>
	<input type="text" name="hasil" value="0"> </br>
</body>
</html>