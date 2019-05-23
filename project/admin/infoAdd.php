<?php
require("../conn.php");
if($id!="")
{//取出info表数据用于修改
	$sql="select * from info where id=$id";
	$result=mysql_query($sql);
	$data=mysql_fetch_array($result);
}

?>
<?php
if($act=="save")
{
	if($id=="")
	{
	$sql="insert into info (name,content,type,s,e,uname) values ('$name','$content','$type','$s','$e','$uname')";
$res=mysql_query($sql);

	if($res)
	{
		if($type=='离职')
			mysql_query("update workers set states='是' where id=$uname");
	echo "<script>alert('添加成功');location.href='info.php?type=$type';</script>";
	exit;
	}
	else
	{
	exit("添加失败了");
	}
	}


$sql="update info set name='$name',content='$content',type='$type',s='$s',e='$e',uname='$uname' where id=$id";
$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('修改成功');location.href='info.php?type=$type';</script>";
	exit;
	}
	else
	{
	exit ("修改失败了");
	}
}
require("./top.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script language=JavaScript src="./js/date.js"></script>

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?php echo $id?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr>
    <td height="19" colspan="4" class="title"><div align="center" class="title"> 添加/修改<?php echo $type?></div></td>
  </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> <?php echo $type?>标题：</td>
<td align="left"><input name="name" type="text" id="name" size="20" value="<?php echo $data[name]?>"></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> <?php echo $type?>内容：</td>
<td align="left"><textarea name="content"  cols="45" rows="5"><?php echo $data[content]?></textarea></td>
</tr>
<input name="type" type="hidden" id="type" size="20" value=<?php echo $type?>>
<?php
if($type=='离职' || $type=="奖惩")
{
?>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> <?php echo $type?>时间：</td>
<td align="left"><input name="s" type="text" id="s" onFocus="show_cele_date(s,'','',s)" size="10" value=<?php echo $data[s]?>></td>
</tr>
<?php
	}else
	{
	?>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 开始时间：</td>
<td align="left"><input name="s" type="text" id="s" onFocus="show_cele_date(s,'','',s)" size="10" value=<?php echo $data[s]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 结束时间：</td>
<td align="left"><input name="e" type="text" id="e" onFocus="show_cele_date(e,'','',e)" size="20" value=<?php echo $data[e]?>></td>
</tr>
<?php
		}
		?>
<input name="uname" type="hidden" id="uname" size="20" value=<?php echo $uname?>><tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="提交">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>