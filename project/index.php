<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>人事管理系统-用户登录</title>
    <style type="text/css">
        <!--
        *{overflow:hidden; font-size:9pt;}
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-image: url(images/bg.gif);
            background-repeat: repeat-x;
        }
        .STYLE2 {
            color: #337ABB;
            font-size: 14pt;
            font-family: "楷体_GB2312";
            font-weight: bold;
        }
        input{
            text-align: center;
        }
        -->
    </style>
    <script language="javascript" type="text/javascript">
        function CheckForm()
        {
            if (document.login.user_no.value.length == 0) {
                alert("请输入用户名称!");
                document.login.user_no.focus();
                return false;
            }
            if (document.login.user_pass.value == "") {
                alert("请输入密码!");
                document.login.user_pass.focus();
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
<table width="100%"  height="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="561" style="background:url(images/lbg.gif)"><table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="238" style="background:url(images/login01.jpg)">&nbsp;</td>
                            </tr>
    <tr>
         <td height="190"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                      <td width="208" height="190" style="background:url(images/login02.jpg)">&nbsp;</td>
                       <td width="518" style="background:url(images/login03.jpg)">
         <form action="CheckLogin.php" method="post" name="login" id="login" onSubmit="return CheckForm();">
                 <table width="389" border="0" align="center" cellpadding="0" cellspacing="0">
                     <tr>
                             <td width="40"><img src="images/user.gif" width="30" height="30"></td>
                              <td width="54" height="40">用户:</td>
                              <td width="295"><input type="text" name="user_no" id="user_no" style="width:164px; height:32px; line-height:34px; background:url(images/inputbg.gif) repeat-x; border:solid 1px #d1d1d1; font-size:9pt; font-family:Verdana, Geneva, sans-serif;"></td>
                     </tr>
                     <tr>
                               <td><img src="images/password.gif" width="28" height="32"></td>
                               <td height="40">密码:</td>
                               <td><input type="password" name="user_pass" id="user_pass" style="width:164px; height:32px; line-height:34px; background:url(images/inputbg.gif) repeat-x; border:solid 1px #d1d1d1; font-size:9pt; "></td>
                     </tr>
                     <tr>
                                <td><img src="images/user.gif" width="30" height="30"></td>
                                 <td height="40">用户类型</td>
                                 <td><label>
                                 <input type="radio" name="identify" value="admin" checked>
                                                                    系统管理员
                     </tr>
                     <tr>
                                 <td>&nbsp;</td>
                                 <td height="40" colspan="2">
                       <div style="padding-left: 70px">
                                <input type="image" border="0" name="imageField" src="images/login.gif" width="95" height="34" onClick="javascript:Login.submit();" alt="登录系统" >
                       </div>
                                 </td>
                        </tr>
</table>
         </form>
         </td>
                      <td width="214" style="background:url(images/login04.jpg)" >&nbsp;</td>
                                        </tr>
                                    </table>
         </td>
                            </tr>
                      <tr>
                                <td height="133" style="background:url(images/login05.jpg)"><br>
                                 <div align="center" class="STYLE2">copyright&copy;2018</div>
                                </td>
                            </tr>
         </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
