<?php
session_start();
require("../conn.php");

include("top.php");

?>

<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
    <tr>
        <td width="100%" height="25" class="back_southidc">我的<?php echo $type ?>管理</td>
    </tr>
    <tr class="tr_southidc">
        <td><br>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="table_southidc">
                <tr bgcolor="#A4B6D7" align="center">
                    <td width="10%" height="25" class="back_southidc">
                        <div>姓名
                    </td>
                    <td width="10%" height="25" class="back_southidc">学历</td>
                    <td width="10%" height="25" class="back_southidc">政治面貌</td>
                    <td width="10%" height="25" class="back_southidc">部门</td>
                    <td width="10%" height="25" class="back_southidc">工资</td>
                    <td width="10%" height="25" class="back_southidc">职务</td>

                    <td width="20%" class="back_southidc">
                        操作
                    </td>
                </tr>

                <?php
                $page = empty($_REQUEST['page']) ? '1' : intval($_REQUEST['page']);

                $where = " where uname='$_SESSION[login_name]'";


                $sql = "select * from workers $where order by id DESC";
                $result = mysql_query($sql);

                while ($data = mysql_fetch_array($result)) {
                    ?>
                    <tr align="center" class="tdbg">
                    <td height="25"><?php echo $data["name"] ?></td>
                    <td height="25"><?php echo get_name($data["xueli"], 'xueli') ?></td>
                    <td height="25"><?php echo get_name($data["mianmao"], 'mianmao') ?></td>

                    <td height="25"><?php echo get_name($data["bumen"], 'bumen') ?></td>
                    <td height="25"><?php echo $data["gongzi"] ?></td>
                    <td height="25"><?php echo get_name($data["zhiwu"], 'zhiwu') ?></td>

                    <td height="25">
                        <a href="myview.php?uname=<?php echo $data[id] ?>&type=<?php echo $type ?>&wname=<?php echo $data[name] ?>">查看</a>
                    </td>
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