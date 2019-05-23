<?php
require("../conn.php");

if ($act == "del") {
    $sql = "delete from info where id=$id";
    $result = mysql_query($sql);
    if ($result) {
        echo "<script>alert('删除成功');location.href='view.php?type=$type&uname=$uname';</script>";
        exit;
    } else {
        exit("删除失败了");

    }
}

include("top.php");

?>

<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
    <tr>
        <td width="100%" height="25" class="back_southidc"><?php echo $type ?>管理</td>
    </tr>
    <tr class="tr_southidc">
        <td><br>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="table_southidc">
                <tr bgcolor="#A4B6D7" align="center">
                    <td width="10%" height="25" class="back_southidc">
                        <div>姓名
                    </td>
                    <td width="10%" height="25" class="back_southidc"><?php echo $type ?>名称</td>
                    <td width="10%" height="25" class="back_southidc">内容</td>
                    <?php
                    if ($type == '离职' || $type == "奖惩") {
                        ?>
                        <td width="12%" height="25" class="back_southidc"><?php echo $type ?>时间</td>
                        <?php
                    } else {
                        ?>
                        <td width="10%" height="25" class="back_southidc">开始时间</td>
                        <td width="10%" height="25" class="back_southidc">结束时间</td>
                        <?php
                    }
                    ?>

                    <td width="15%" class="back_southidc">
                        操作
                    </td>

                </tr>
                <?php

                $sql = "select * from info where uname='$uname' and type='$type' order by id DESC";

                $result = mysql_query($sql);
                while ($data = mysql_fetch_array($result)) {
                    ?>
                    <tr align="center" class="tdbg">
                    <td height="25"><?php echo $wname ?></td>
                    <td height="25"><?php echo $data["name"] ?></td>
                    <td height="25"><?php echo $data["content"] ?></td>

                    <?php
                    if ($type == '离职' || $type == "奖惩") {
                        ?>
                        <td height="25"><?php echo $data["s"] ?></td>

                        <?php
                    } else {

                        ?>
                        <td height="25"><?php echo $data["s"] ?></td>

                        <td height="25"><?php echo $data["e"] ?></td>

                        <?php
                    }
                    ?>

                    <td height="25"><a
                            href="infoAdd.php?id=<?php echo $data[id] ?>&type=<?php echo $type ?>&wname=<?php echo $wname ?>&uname=<?php echo $uname ?>">修改</a>
                        | <a
                            href="?act=del&id=<?php echo $data[id] ?>&type=<?php echo $type ?>wname=<?php echo $wname ?>&uname=<?php echo $uname ?>"
                            onClick="return confirm('您确定要删除吗?')">删除</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </td>
    </tr>
</table>
</td>
</tr>
</table>