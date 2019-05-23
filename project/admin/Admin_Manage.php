<?php
require("../conn.php");
if ($mark == "del") {
    if ($id == 1) {
        echo "<script>alert('内置管理员不能删除');history.back();</script>";
        exit;
    }
    $sql = "delete from admin where Id=$id";
    mysql_query($sql);
}
?>


<script language="javascript">
    function ConfirmDel() {
        if (confirm("确定要删吗！"))
            return true;
        else
            return false;
    }

    function form_onsubmit() {
        if (document.form_admin.UserName.value == "") {
            alert("账号不能为空。");
            return false;
        }
        if (document.form_admin.Password.value == "") {
            alert("密码不能为空。");
            return false;
        }
        if (document.form_admin.Password.value != document.form_admin.ConPassword.value) {
            alert("新密码和确认密码不一致。");
            document.form_admin.Password.value = '';
            document.form_admin.ConPassword.value = '';
            document.form_admin.Password.focus();
            return false;
        }
    }

</SCRIPT>

<?php
include("top.php");
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" valign="top"><br> <strong><br>
            </strong>
            <table width="720" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
                <tr>
                    <td class="back_southidc" width="598" height="25">添加管理员</td>
                </tr>
                <tr class="tr_southidc">
                    <FORM name="form_admin" method="post" onsubmit="return form_onsubmit()"
                          action="Admin_ManageSave.php">
                        <td>
                            <table width="50%" border="0" align="center" cellpadding="0" cellspacing="1"
                                   class="table_southidc">
                                <tr>
                                    <td height="25" colspan="2" class="back_southidc">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="29%" height="22"> 管理员帐号：</td>
                                    <td width="71%"><input name="UserName" type="text" id="UserName" size="16"
                                                           maxlength="20"></td>
                                </tr>
                                <tr>
                                    <td height="22"> 管理员密码：</td>
                                    <td><input name="Password" type="password" size="16" maxlength="20"></td>
                                </tr>
                                <tr>
                                    <td height="22"> 密码确认：</td>
                                    <td><input name="ConPassword" type="password" size="16" maxlength="20"></td>
                                </tr>

                                <tr>
                                    <td height="22" colspan="2" align="center" valign="middle">
                                        <INPUT type=submit value='确认添加' name=Submit2></td>
                                </tr>
                            </table>
                        </td>
                    </form>
                </tr>
            </table>
            <br>
            <table width="620" border="0" cellpadding="2" cellspacing="1" class="table_southidc">
                <tr>
                    <td width="553" height="25" class="back_southidc"> 管理员帐号管理</td>
                </tr>
                <tr class="tr_southidc">
                    <td><br>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1"
                               class="table_southidc">
                            <tr bgcolor="#A4B6D7">
                                <td width="28%" height="25" class="back_southidc">
                                    <div align="center">管理员帐号
                                </td>

                                <td width="24%" class="back_southidc">
                                    <div align="center">操作
                                </td>
                                <td width="20%" class="back_southidc">
                                    <div align="center">删除
                                </td>
                            </tr>
                            <?php
                            $sql = "select * from admin";
                            $result = mysql_query($sql);
                            while ($rs = mysql_fetch_array($result)) {
                                ?>
                                <tr bgcolor="#DFEBF2">
                                    <td height="22">
                                        <div align="center"><?php echo $rs["UserName"] ?></td>

                                    <td>
                                        <div align="center">
                                            <?php
                                            echo "<a href='Admin_ManageEdit.php?ID=" . $rs["Id"] . "'>修改</a>";
                                            ?>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <a href="Admin_Manage.php?id=<?php echo $rs["Id"] ?>&mark=del"
                                               onClick="return ConfirmDel();">删除</a>
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
