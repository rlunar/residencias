<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="jquery-ui-1.10.1/css/start/jquery-ui-1.10.1.custom.min.css">
    <script type="text/javascript" src="jquery-ui-1.10.1/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="jquery-ui-1.10.1/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#abbrev').val("");
            
            $("#state").autocomplete({
                source: "states.php",
                minLength: 2,
                select: function(event, ui) {
                    $('#state_id').val(ui.item.id);
                    $('#abbrev').val(ui.item.abbrev);
                }
            });
            
            $("#state_abbrev").autocomplete({
                source: "states_abbrev.php",
                minLength: 2
            });
        });

    </script>
</head>
<body>
	<form action="<?php echo $PHP_SELF;?>"  method="post">
		<fieldset>
			<legend>jQuery UI Autocomplete Example - PHP Backend</legend>
			<p>Start typing the name of a state or territory of the United States</p>
			<p class="ui-widget">
				<label for="state">State (abbreviation in separate field): </label>
				<input type="text" id="state"  name="state" /> 
				<input readonly="readonly" type="text" id="abbrev" name="abbrev" maxlength="2" size="2"/>
			</p>
			<input type="hidden" id="state_id" name="state_id" />
			<p class="ui-widget">
				<label for="state_abbrev">State (replaced with abbreviation): </label>
				<input type="text" id="state_abbrev" name="state_abbrev" />
			</p>
			<p><input type="submit" name="submitBtn" value="Submit" /></p>
		</fieldset>
	</form>
	<?php
if (isset($_POST['submit'])) {
echo "<p>";
	while (list($key,$value) = each($_POST)){
	echo "<strong>" . $key . "</strong> = ".$value."<br />";
	}
echo "</p>";
}
?>
</body>
</html>