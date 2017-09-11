<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <script type="text/javascript" src="/lianxi/Public/jquery-1.8.2.min.js"></script>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table border="1">
    <th>
        <input type="checkbox" name="q_a" value="checked">
    </th>
    <th>用户ID</th>
    <th>用户名称</th>
    <th>操作</th>
        <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>
            <td>
                <input type="checkbox" name="q_x" value="checked" id="<?php echo ($v["n_id"]); ?>">
            </td>
            <td><?php echo ($v["n_id"]); ?></td>
            <td><span class="xiu" value="<?php echo ($v["n_name"]); ?>" id="<?php echo ($v["n_id"]); ?>"><?php echo ($v["n_name"]); ?></span></td>
            <td>
                <input type="button" value="删除" n_id="<?php echo ($v["n_id"]); ?>" class="del">
            </td>
            </tr><?php endforeach; endif; ?>
    <tr>
        <td><input type="button" class="q" value="全选"></td>
        <td><input type="button" class="f" value="反选"></td>
        <td><input type="button" class="qu" value="取消"></td>
        <td><input type="button" class="delete" value="批量删除"></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="查看操作日志" class="c">
        </td>
    </tr>

</table>
</body>
</html>
<script>
    $(function()
        {
            //全选
            $(document).on('click','.q',function(){
                $("input[type='checkbox']").prop("checked", true);
            });


            //反选
            $(document).on('click','.f',function(){

                $("input[type='checkbox']").prop("checked", function( i, val ) {
                    return !val;
                });
            });


            //取消
            $(document).on('click','.qu',function(){
                $("input[type='checkbox']").prop("checked", false);
            });


            //单删
            $(".del").click(function()
            {
                var n_id=$(this).attr("n_id");
//                alert(n_id);
                $.get("<?php echo U('delete');?>", { n_id:n_id},
                        function(data){
//                            alert(data);
                            if(data==1){
                                location.href="<?php echo U('index');?>";
                            }

                        });
            });


            //批删
            $(".delete").click(function()
            {
//              alert(123);
                var id="";
                $("input[type='checkbox']:checked").each(function()
                {
                   id+=','+$(this).attr("id");
                });
                id=id.substr(1);
//                alert(id);
                $.get("<?php echo U('delete');?>", { n_id:id},
                        function(data){
//                            alert(data);
                            if(data==1){
                                location.href="<?php echo U('index');?>";
                            }

                        });

            });




            //即点即改
            $(".xiu").click(function()
            {
//                alert(123);
                var id=$(this).attr("id");
//                alert(id);
                var name=$(this).parent();
                 name.html('<input type="text" value="'+$(this).attr('value')+'">');
//                 name.html('<input type="text"  value="'+$(this).attr('value')+'">');

                 name.children().blur(function()
                 {
//                     alert(123);
                     var a=$(this);
                     var name=a.attr("value");
//                     alert(name);
                     $.get("<?php echo U('save');?>", { id:id,name:name},
                             function(data){
//                            alert(data);
                                 if(data==1){
                                     location.href="<?php echo U('index');?>";
                                 }

                             });
                 })
            });


            //查看日志
            $(".c").click(function(){
                location.href="<?php echo U('lists');?>";
            });



        });
</script>