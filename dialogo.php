<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="jquery-ui-1.10.1/css/start/jquery-ui-1.10.1.custom.min.css">
    <script type="text/javascript" src="jquery-ui-1.10.1/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="jquery-ui-1.10.1/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script type="text/javascript">
        
    $(function(){ 
                    
            $('#dialog').dialog({
                autoOpen: false,
                width: 400,
                modal: true,
                resizable: false,
                buttons: {
                    "Submit Form": function() {
                        document.testconfirmJQ.submit();
                    },
                    "Cancel": function() {
                        $(this).dialog("close");
                    }
                }
            });
            
            $('form#testconfirmJQ').submit(function(e){
                e.preventDefault();

                $("p#dialog-email").html($("input#emailJQ").val());
                $('#dialog').dialog('open');
            });
    });

    </script>
</head>
<body>
<?php
    if (isset($_POST['emailJQ']))
    {
        echo "<p class='message'>jQuery UI worked!!! Your e-mail address is " .$_POST['emailJQ'];
        echo "</p>";
    }
?>
    <form id="testconfirmJQ" name="testconfirmJQ" method="post">
        <fieldset>
            <legend>jQuery UI Modal Submit</legend>
            <p><label for="email">E-mail:</label><br />
                <input id="emailJQ" type="text" name="emailJQ" value="rluna@intelisis.com" /></p>
            <p><input type="submit" value="Submit" /></p>
        </fieldset>
    </form>
    <div id="dialog" title="Verify Form jQuery UI Style">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span> You entered your e-mail address as:</p>
        <p id="dialog-email"></p>
        <p>If this is correct, click Submit Form.</p>
        <p>To edit, click Cancel.<p>
    </div>
</body>
</html>