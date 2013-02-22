<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="jquery-ui-1.10.1/js/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#JqpostForm").submit(function(e){
                e.preventDefault();

                $.post(
                    "ajaxform_procesar.php",
                    $("#JqpostForm").serialize(),
                    function(msg)
                    {
                        if(msg.validar == "ok")
                        {  
                            $("#message_post").html("<div>" + msg.email + " is a valid e-mail address. Thank you "+msg.name+"</div>");
                        }   
                        else
                        {
                            $("#message_post").html("<div>Sorry " + msg.name + ", " + msg.email + " is NOT a valid e-mail address. Try again.</div>");
                        }
                    },
                    "json"
                );
                
            });
        });
    </script>
</head>
<body>
    <form id="JqpostForm">
        <fieldset>
            <legend>jQuery.post Form Submit</legend>
            <p><label for="name_post">Name:</label><br />
                <input id="name_post" type="text" name="name_post"  value="Roberto"/></p>
            <p><label for="email_post">E-mail:</label><br />
                <input id="email_post" type="text" name="email_post" value="rluna@intelisis.com" /></p>
            <p><input type="submit" value="Submit" /></p>
        </fieldset>
    </form>
    <div id="message_post"></div>
</body>
</html>