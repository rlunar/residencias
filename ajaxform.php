<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <title></title>
    <script type="text/javascript" src="jquery-ui-1.10.1/js/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#JqAjaxForm").submit(function(e){
                e.preventDefault();
                dataString = $("#JqAjaxForm").serialize();

                $.ajax({
                  url: 'ajaxform_procesar.php',
                  type: 'POST',
                  dataType: "json",
                  data: dataString,
                  success: function(msg){
                    if(msg.validar == "ok")
                    {
                        $("#message_ajax").html("<div>" + msg.email + " is a valid e-mail address. Thank you "+msg.name+"</div>");
                    }   
                    else
                    {
                        $("#message_ajax").html("<div>Sorry " + msg.name + ", " + msg.email + " is NOT a valid e-mail address. Try again.</div>");
                    }
                  }
                });
                
           }); 
        });
    </script>
</head>
<body>
    <form id="JqAjaxForm">
        <fieldset>
            <legend>jQuery.ajax Form Submit</legend>
            <p><label for="name_ajax">Name:</label><br />
                <input id="name_ajax" type="text" name="name_ajax"  value="Roberto"/></p>
            <p><label for="email_ajax">E-mail:</label><br />
                <input id="email_ajax" type="text" name="email_ajax" value="rluna@intelisis.com" /></p>
            <p><input type="submit" value="Submit" /></p>
        </fieldset>
    </form>
    <div id="message_ajax"></div>
</body>
</html>