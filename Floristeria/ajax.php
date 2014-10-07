<?php ?>
<html>
    <head>
        <script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
        <title>myApp</title>
    </head>
    <body>
        
        <div id="myCanvas"></div>
        <script type="text/javascript">
            
                var ctx = document.getElementById("myCanvas");
                ctx = ctx.getContext('2d');
                ctx.fillRect(10, 10, 50, 50);
                
                

                /*
                 var n = 0;
                 var data = "";
                 var settings = {
                 url: 'image.php',
                 type: 'POST',
                 dataType: "JSON",
                 data: data,
                 success: ajaxSuccess,
                 complete: ajaxComplete,
                 error: ajaxError,
                 timeout: 100
                 };
                 
                 function ajaxSuccess(data, textStatus, jqXHR) {
                 n += 1;
                 $.ajax(settings);
                 }
                 function ajaxComplete(jqXHR, textSatus) {
                 
                 }
                 function ajaxError(jqXHR, textStatus, errorThrown) {
                 
                 }
                 
                 function ajaxInitialize() {
                 $.ajax(settings);
                 }
                 
                 ajaxInitialize();
                 */



            
        </script>
    </body>
</html>