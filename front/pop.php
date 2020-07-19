<style>
    .all{
        display:none;
    }
    .alerr{
       background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
$all=$News->count(['sh'=>1]);
$div=5;
$pages=ceil($all/$div);
$now=$_GET['p']??1;
$prev=(($now-1)>0)?($now-1):1;
$next=(($now+1)<=$pages)?($now+1):$now;
$start=($now-1)*$div;
$news=$News->all(['sh'=>1]," ORDER BY good DESC LIMIT $start,$div ");
foreach($news as $n){
        ?>
        <tr>
            <td class="clo"><?=$n['title'];?></td>
            <td>
                <div id="t<?=$n['id'];?>" class="tt"><?=mb_substr($n['text'],0,20,"utf8");?>...</div>
                <div id="a<?=$n['id'];?>" class="all alerr"><?=nl2br($n['text']);?></div>
            </td>
            <td>
                <span id="vie<?=$n['id'];?>"><?=$n['good'];?></span>個人說<img src="img/02B03.jpg" style="width:30px">-
                <?php
                    if (!empty($_SESSION['login'])) {
                        $chk = $Log->count(['news' => $n['id'], 'user' => $_SESSION['login']]);
                        if ($chk > 0) {
                    ?>
                            <a id="good<?= $n['id']; ?>" href="#" onclick="good('<?= $n['id']; ?>','2','<?= $_SESSION['login']; ?>')">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a id="good<?= $n['id']; ?>" href="#" onclick="good('<?= $n['id']; ?>','1','<?= $_SESSION['login']; ?>')">讚</a>
                    <?php
                        }
                    }
                    ?>
            </td>
        </tr>
<?php }
        ?>
    </table>
    <div>
        <?php
        echo "<a href='index.php?do=pop&p=".$prev."'> < </a>";
for($i=1;$i<=$pages;$i++){
    $size=($now==$i)?"30px":"20px";
    echo "<a href='index.php?do=pop&p=".$i."' style='font-size:$size'>".$i."</a>";
}
echo "<a href='index.php?do=pop&p=".$next."'> > </a>";
        ?>
    </div>
</fieldset>
<script>
    $(".clo").hover(function(){
        $(this).next("td").children(".all").toggle();
    })
</script>