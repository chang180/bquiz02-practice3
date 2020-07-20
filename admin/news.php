<fieldset>
    <legend>最新文章管理</legend>
<form action="api/editnews.php" method="post">
    <table >
        <tr>
            <td>編號</td>
            <td>標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
    <?php
    $users=$News->all();
    $div = 3;
    $all = $News->count();
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $prev = (($now - 1) > 0) ? ($now - 1) : 1;
    $next = (($now + 1) <= $pages) ? ($now + 1) : $now;
    $start = ($now - 1) * $div;
    $news = $News->all([], " LIMIT $start,$div ");
        foreach ($news as $u) {
    
    ?>
        <tr>
            <td class="clo"><?=($start+1);?>.</td>
            <td><?=$u['title'];?></td>
            <td><input type="checkbox" name="sh[]" value="<?=$u['id'];?>" <?=($u['sh']==1)?"checked":"";?>></td>
            <td><input type="checkbox" name="del[]" value="<?=$u['id'];?>"></td>
<input type="hidden" name="id[]" value="<?=$u['id'];?>">
        </tr>
    <?php 
    $start++;
}
 ?>
    </table>
    <?php
        echo "<a href='admin.php?do=news&p=" . $prev . "'> < </a>";
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? "30px" : "20px";
            echo "<a href='admin.php?do=news&p=" . $i . "' style='font-size:$size'>" . $i . "</a>";
        }
        echo "<a href='admin.php?do=news&p=" . $next . "'> > </a>";
        ?>
    <div class="ct">
        <button type="submit">確定修改</button>
    </div>
</form>