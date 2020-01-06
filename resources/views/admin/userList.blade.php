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
        <table border="1">
            <tr>
                <td>id</td>
                <td>名字</td>
                <td>操作</td>
            </tr>
            @foreach($data as $k=>$v)
            <tr>
                <td class="id">{{$v['id']}}</td>
                <td>{{$v['name']}}</td>
                <td><a href="#">解锁</a></td>
            </tr>
                @endforeach
        </table>
</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    var id = $('.id').text();
    $('a').click(function () {
        $.ajax({
            url:'/Admin/editUser',
            data:{id:id},
            type:'post',
            dataType:'json',
            success:function (res) {
                alert(res.msg);
            }
        });
    })
</script>
