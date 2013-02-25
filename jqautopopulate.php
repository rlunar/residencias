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
        
            //clear values on refresh
            $('#abbrev').val("");
            $('#city').val("");
            
            $("#zip_code").attr('disabled', true);
            
            $("#state").autocomplete({
                source: "states.php",
                minLength: 2,
                select: function(event, ui) {
                    $('#state_id').val(ui.item.id);
                    $('#abbrev').val(ui.item.abbrev);
                    $("#zip_code").attr('disabled', false);
                },
                change: function(event, ui){
                    secondary_url = "zips.php?filter=" + ui.item.abbrev;
                    $("#zip_code").autocomplete("option", "source", secondary_url);
                }
            });
            
            $("#zip_code").autocomplete({
                source: "",
                minLength: 2,
                select: function(event,ui){
                    $('#city').val(ui.item.city);               
                }
            });
            
        });
        
    </script>
</head>
<body>
    <form action="YOUR-FILE-HERE"  method="post">
        <fieldset>
            <legend>jQuery UI Multi-Autocomplete Example</legend>
            <p>Start typing the name of a state or territory of the United States</p>
            <p><label for="state">State (abbreviation in separate field): </label>
                <input type="text" id="state"  name="state" /> <input readonly="readonly" type="text" id="abbrev" name="abbrev" maxlength="2" size="2"/></p>
            <input type="hidden" id="state_id" name="state_id" />
            <p><label for="zip_code">Zip (only Zips from state selected above): </label>
                <input type="text" id="zip_code" name="zip_code" maxlength="5" size="15" /></p>
            <p class="ui-widget"><label for="city">City:</label>
                <input readonly="readonly" type="text" id="city" name="city" /></p>
            <p><input type="submit" name="submit" value="Submit" /></p>
        </fieldset>
    </form>
</body>
</html>