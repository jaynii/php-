<?php
session_start();
require "../conn.php";

if ($act == "Del") {
    $sql = "delete from xueli where id=$id";
    $result = mysql_query($sql);

}
if ($id != "") {
    $sql = "select * from xueli where id=$id";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <title>学历管理</title>
    <style type="text/css">
        <!--

        .back_southidc {
            color: #048590;
            text-align: center;

        }

        .tang_southidc {
            color: #135294;
            text-align: center;
            font-weight: bold;
            background-color: #add2da;

        }

        .table_southidc {
            BACKGROUND-COLOR: #add2da;
            margin-bottom: 5px;
        }

        /*表格的蓝色底线*/

        -->
    </style>
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="30">
            <div align="center">学历管理</div>
        </td>
    </tr>
    <tr>
        <td>
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
                <?php
                $sql = "select * from xueli";
                $result = mysql_query($sql);
                ?>
                <tr align="center">
                    <td bgcolor="#FFFFFF">学历名称</td>
                    <td width="75" bgcolor="#FFFFFF">页面操作</td>
                </tr>
                <?php
                while ($type = mysql_fetch_array($result)) {
                    ?>
                    <tr align="center">
                        <td height="20" bgcolor="#FFFFFF"><?php echo $type[name]; ?></td>

                        <td height="20" bgcolor="#FFFFFF">
                            <a href="?id=<?php echo $type[id] ?>&act=edit">修改</a>

                            <a href="?id=<?php echo $type[id] ?>&act=Del">删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </td>
    </tr>
</table>
<?php
if ($act == "save") {
    if ($id == "") {
        $sql = "insert into xueli (name) values ('$p0')";
        if (mysql_query($sql)) {
            echo "<script>location.href='xueli.php'</script>";
            exit;
        } else {
            echo "添加失败";
            exit;
        }
    }
    $sql = "update xueli set name='$p0' where id=$id";
    mysql_query($sql);
    echo "<script>location.href='xueli.php'</script>";
    exit;
}
?><p>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
    <form name="form1" method="post" action="?act=save&id=<?php echo $data[id] ?>" onSubmit="return chkinput(this)">
        <tr>
            <td height="30">
                <div align="center">添加/编辑学历</div>
            </td>
        </tr>
        <tr>
            <td>
                <table width="580" border="0" align="center" cellpadding="0" cellspacing="1">
                    <tr>
                        <td height="25" bgcolor="#FFFFFF">
                            <div align="right">学历名称</div>
                        </td>
                        <td bgcolor="#FFFFFF">
                            <div align="left">
                                <input type="text" name="p0" class="inputcss" size="20"
                                       value="<?php echo $data[name] ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="20">
                <div align="center"><input type="submit" value="保存" class="buttoncss">&nbsp;</div>
            </td>
        </tr>
    </form>
</table>
</p>
<p>&nbsp;</p>
</form>
</body>
</html>
