<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table>
    <th>操作ID</th>
    <th>操作内容</th>
    <th>操作时间</th>
    <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>
            <td><?php echo ($v["g_id"]); ?></td>
            <td><?php echo ($v["g_mess"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$v["g_time"])); ?></td>
        </tr><?php endforeach; endif; ?>
</table>
</body>
</html>