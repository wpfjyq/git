<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js.js"></script>
    <script>
        $(function () {
            var message = $("#span").html();
            var url  =$("#url").attr('href');
            alert(message)
            location.href=url
        })
    </script>
</head>
<body>
<center>
    <form action="">
    </form>
    <div style="display: none" align="center" >
        <span id="span"><?php  echo $message  ?></span>
        <a id="url" href="<?php echo $url ?>">确定</a>
    </div>
</center>
</body>
</html>