<?php
error_reporting(E_ALL ^ E_NOTICE);//报错级别设置
session_start();
if ($_SESSION[admin] == "")
    header("location:../index.php");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>管理系统</title>
    <LINK href="Images/ak_style.css" type=text/css rel=stylesheet>
    <script>
        self.moveTo(0, 0)
        self.resizeTo(screen.availWidth, screen.availHeight)
    </script>
    <script language="javascript">
        function collapse(objid) {
            var obj = document.getElementById(objid);
            collapseAll();
            obj.style.display = '';
        }
        function collapseAll() {
            for (var i = 0; i < 30; i++) {
                var obj = document.getElementById('g_' + i.toString());
                if (obj) obj.style.display = 'none';
            }
        }
        function expandAll() {
            for (var i = 0; i < 30; i++) {
                var obj = document.getElementById('g_' + i.toString());
                if (obj) obj.style.display = '';
            }
        }
    </script>

    <style type="text/css">
        <!--
        body {
            background-color: #353C44;
        }

        -->
    </style>
</head>

<body">

<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table1">
    <tr>
        <td class="AK_R_Top_bg">
            <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table2">
                <tr>
                    <td width="388" background="../images/main_01.jpg" class="AK_R_Top_logo">&nbsp;</td>
                    <td height="57" background="Images/main_03.gif">　</td>
                    <td align="right" vAlign="bottom" background="Images/main_03.gif">
                        <table width="280" border="0" align="right" cellPadding="0" cellSpacing="0">
                            <tr>
                                <td width="33" height="27"><img src="Images/main_05.gif" width="33" height="27"
                                                                border="0"></td>
                                <td width="248" background="Images/main_06.gif">
                                    <table cellSpacing="0" cellPadding="0" width="225" align="center" border="0"
                                           id="table4">
                                        <tr>

                                            <td class="AK_R_Top_Exit"><a href="../logout.php" target="_top">退出系统</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td background="Images/main_10.gif" height="40">
            <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table5">
                <tr>
                    <td background="Images/main_07.gif" height="40">
                        <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
                            <tr>
                                <td align="middle" width="21"><img height="14" src="Images/main_13.gif" width="19">

                                <td class="AK_T_QM">
                                    <marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrollAmount="3"
                                             hspace="6" width="430">
                                        欢迎你，<?php echo $_SESSION["AdminName"] ?>
                                    </marquee>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="248" background="Images/main_11.gif"
                    ">
                    <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
                        <tr>
                            <td width="16%">　</td>
                            <td align="middle" width="75%"><font color="#FFFFFF">
                                    <script language="JavaScript">
                                        <!--
                                        tmpDate = new Date();
                                        date = tmpDate.getDate();
                                        month = tmpDate.getMonth() + 1;
                                        year = tmpDate.getYear();
                                        document.write(year);
                                        document.write("年");
                                        document.write(month);
                                        document.write("月");
                                        document.write(date);
                                        document.write("日");
                                        // -->
                                    </script>
                                </font></td>
                            <td width="9%">　</td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td background="Images/main_31.gif" height="30">
            <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table8">
                <tr>
                    <td width="8" height="30" valign="top"><img height="30" src="Images/main_28.gif" width="8"></td>
                    <td width="147" background="Images/main_29.gif">
                        <table width="90%" border="0" align="center" cellPadding="0" cellSpacing="0" id="table9">
                            <tr>
                                <td width="24%">　</td>
                                <td vAlign="bottom" width="43%" height="20">菜单导航</td>
                                <td width="33%">　</td>
                            </tr>
                        </table>
                    </td>
                    <td width="15"><img height="30" src="Images/main_30.gif" width="12"></td>
                    <td>
                        <!--系统菜单开始-->
                        <table cellSpacing="0" cellPadding="0" align="left" border="0" id="table10">
                            <tr>
                                <td class="AK_R_Menu"><a href="default.php" target="frmright">系统首页</a></td>
                            </tr>
                        </table>
                        <!--系统菜单结束--></td>
                    <td width="17" align="right" valign="top"><img height="30" src="Images/main_32.gif" width="17"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table8">
                <tr>
                    <td width="8" height="30" valign="top" background="Images/main_28.gif"><img height="30"
                                                                                                src="Images/main_28.gif"
                                                                                                width="8"></td>
                    <td height="500" bgcolor="#ADD2DA">
                        <?php
                        require("left.php");
                        ?> &nbsp;</td>
                    <td width="10" valign="top" bgcolor="#ADD2DA"><img height="33" src="Images/main_30.gif" width="10">
                    </td>
                    <td valign="top" bgcolor="#FFFFFF">
                        <IFRAME frameBorder=0 id=frmright name=frmright scrolling=yes src="main.php" border="false"
                                style="HEIGHT: 100%; VISIBILITY: inherit; WIDTH: 100%; Z-INDEX: 1">
                        </IFRAME>
                    </td>
                    <td width="17" valign="top" background="Images/main_35.gif"><img src="Images/main_35.gif" width="17"
                                                                                     height="33"></td>
                </tr>
                <tr>
                    <td height="33" valign="top" background="Images/main_28.gif">&nbsp;</td>
                    <td width="147" height="33" valign="top" background="Images/main_36.gif"><img
                            src="Images/main_38.gif" width="147"></td>
                    <td valign="top" background="Images/main_36.gif">&nbsp;</td>
                    <td valign="top" background="Images/main_36.gif">&nbsp;</td>
                    <td height="33" valign="top" background="Images/main_28.gif"><img src="Images/main_37.gif"
                                                                                      width="17" height="33"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
