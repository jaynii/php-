<?php
error_reporting(E_ALL ^ E_NOTICE);//报错级别设置
$conn = mysql_connect("localhost", "root", "") or die("数据库服务器连接错误" . mysql_error());
mysql_select_db("db_renshi", $conn) or die("数据库访问错误" . mysql_error());//选择数据库
mysql_query("set names gbk");//设置编码为中文

//上传实现
@extract($_POST);
@extract($_GET);


//分页函数.
function get_pager($url, $param, $count, $page = 1, $size = 10)
{
    $size = intval($size);
    if ($size < 1) $size = 10;
    $page = intval($page);
    if ($page < 1) $page = 1;
    $count = intval($count);

    $page_count = $count > 0 ? intval(ceil($count / $size)) : 1;
    if ($page > $page_count) $page = $page_count;

    $page_prev = ($page > 1) ? $page - 1 : 1;
    $page_next = ($page < $page_count) ? $page + 1 : $page_count;

    $param_url = '?';
    foreach ($param as $key => $value) $param_url .= $key . '=' . $value . '&';

    $pager['url'] = $url;
    $pager['start'] = ($page - 1) * $size;
    $pager['page'] = $page;
    $pager['size'] = $size;
    $pager['count'] = $count;
    $pager['page_count'] = $page_count;

    if ($page_count <= '1') {
        $pager['first'] = $pager['prev'] = $pager['next'] = $pager['last'] = '';
    } else {
        if ($page == $page_count) {
            $pager['first'] = $url . $param_url . 'page=1';
            $pager['prev'] = $url . $param_url . 'page=' . $page_prev;
            $pager['next'] = '';
            $pager['last'] = '';
        } elseif ($page_prev == '1' && $page == '1') {
            $pager['first'] = '';
            $pager['prev'] = '';
            $pager['next'] = $url . $param_url . 'page=' . $page_next;
            $pager['last'] = $url . $param_url . 'page=' . $page_count;
        } else {
            $pager['first'] = $url . $param_url . 'page=1';
            $pager['prev'] = $url . $param_url . 'page=' . $page_prev;
            $pager['next'] = $url . $param_url . 'page=' . $page_next;
            $pager['last'] = $url . $param_url . 'page=' . $page_count;
        }
    }
    return $pager;
}

function getfenlei($id, $reid)
{

    $sql = "select * from categories where reid=0";
    $result = mysql_query($sql);
    echo '<select name="dalei" onchange="getCity(this.value)">';
    $i = 1;
    while ($row = mysql_fetch_array($result)) {
        if ($reid == '') {
            if ($i == 1) $initid = $row['id'];
        } else
            $initid = $id;
        if ($id == $row['id'])
            echo "<option value='" . $row['id'] . "' selected>" . $row['name'] . "</option>";
        else
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        $i++;
    }

    echo "</select>";
    //读取子分类

    $sql1 = "select * from categories where reid='$initid'";
    $result1 = mysql_query($sql1);

    echo ' -> <select name="xiaolei">';
    while ($row1 = mysql_fetch_array($result1)) {
        if ($row1['id'] == $reid)
            echo "<option value='" . $row1['id'] . "' selected>" . $row1['name'] . "</option>";
        else
            echo "<option value='" . $row1['id'] . "'>" . $row1['name'] . "</option>";
    }

    echo "</select>";

}

function get_name($id, $table)
{
    $sql = "select * from $table where id=$id";
    $r = mysql_query($sql);
    $rows = mysql_fetch_array($r);

    return $rows[name];
}

?>
