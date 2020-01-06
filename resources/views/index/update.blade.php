<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="text" name="name">
    <input type="button" value="修改">
</form>
</body>
</html>
<script src="/js/jquery.min.js/"></script>
<script>
    $.ajax({
        url:'/Admin/updateInfo',
        dataType:'json',
        type:'post',
        success:function (res) {
            $('[name="name"]').attr('value',res.name).attr('id',res.id);
        }
    });
    $('[type="button"]').click(function () {
        var name = $('[name="name"]').val();
        var id = $('[name="name"]').attr('id');
        $.ajax({
            url:"/Admin/edit",
            data:{name:name,id:id},
            dataType:"json",
            type:'post',
            success:function (res) {
                alert(res.msg);
            }
        });
    })
</script>
