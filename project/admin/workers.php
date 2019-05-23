<?php
require("../conn.php");

if ($act == "del") {
    $sql = "delete from workers where id=$id";
    $result = mysql_query($sql);
    if ($result) {
        echo "<script>alert('删除成功');location.href='workers.php';</script>";
        exit;
    } else {
        exit("删除失败了");

    }
}
include("top.php");

?>
<form id="form1" name="form1" method="post" action="?Act=sea">
    <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">

            <td>员工帐号:<input name="uname" type="text" id="name" size="20">

                员工名称:<input name="name" type="text" id="name" size="20">
                <input type="submit" name="button" id="button" value="查询"/></td>

        </tr>
    </table>
    <table width="100%" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
        <tr>
            <td width="100%" height="25" class="back_southidc">档案管理</td>
        </tr>
        <tr class="tr_southidc">
            <td><br>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="table_southidc">
                    <tr bgcolor="#A4B6D7" align="center">
                        <td width="10%" height="25" class="back_southidc">
                            <div>姓名
                        </td>
                        <td width="10%" height="25" class="back_southidc">登录帐号</td>
                        <td width="10%" height="25" class="back_southidc">登录密码</td>
                        <td width="12%" height="25" class="back_southidc">生日</td>
                        <td width="10%" height="25" class="back_southidc">部门</td>
                        <td width="10%" height="25" class="back_southidc">工资</td>
                        <td width="8%" height="25" class="back_southidc">性别</td>
                        <td width="10%" height="25" class="back_southidc">职务</td>

                        <td width="15%" class="back_southidc">
                            操作
                        </td>

                    </tr>

                    <?php
                    $page = empty($_REQUEST['page']) ? '1' : intval($_REQUEST['page']);

                    $where = " where states='否'";
                    if ($name != "") $where .= " and name like '%$name%'";

                    if ($uname != "") $where .= " and uname='$uname'";

                    $sql = "select * from workers $where order by id DESC";
                    $result = mysql_query($sql);
                    $count = mysql_num_rows($result);
                    $size = 5;

                    $pager = get_pager('workers.php', array(), $count, $page, $size);
                    $sql = "select * from workers $where order by id DESC limit $pager[start],$pager[size]";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result)) {
                        ?>
                        <tr align="center" class="tdbg">
                        <td height="25"><?php echo $data["name"] ?></td>
                        <td height="25"><?php echo $data["uname"] ?></td>
                        <td height="25"><?php echo $data["pwd"] ?></td>
                        <td height="25"><?php echo $data["birth"] ?></td>

                        <td height="25"><?php echo get_name($data["bumen"], 'bumen') ?></td>
                        <td height="25"><?php echo $data["gongzi"] ?></td>
                        <td height="25"><?php echo $data["sex"] ?></td>
                        <td height="25"><?php echo get_name($data["zhiwu"], 'zhiwu') ?></td>

                        <td height="25"><a href="workersAdd.php?id=<?php echo $data[id] ?>">查看编辑</a>
                            | <a href="?act=del&id=<?php echo $data[id] ?>" onClick="return confirm('您确定要删除吗?')">删除</a>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr align="center" bgcolor="#F2FDFF">
                        <td colspan="18" class="optiontitle">&nbsp;<?php require("../page.php") ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</form>