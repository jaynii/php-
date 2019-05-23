<?php
require("../conn.php");
$sql = "select * from admin where UserName='$UserName'";

$result = mysql_query($sql);
$info = mysql_fetch_array($result);
if ($info == false) {
    $PassWord = md5($Password);
    $sql = "insert into admin (UserName,PassWord,type) values('$UserName','$PassWord','$type')";
    $result = mysql_query($sql);
    echo "<script>alert('添加成功');location.href='Admin_Manage.php'</script>";
} else {
    echo "<script>alert(管理员帐号已经存在');history.go(-1);</script>";
    exit();
}
?>