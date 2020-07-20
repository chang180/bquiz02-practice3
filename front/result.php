<?php
$q = $Que->find($_GET['id']);
?>
<style>
    .bar{
        display:inline-block;
        height:30px;
        background:#ccc;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $q['text']; ?></span></legend>
    <h4><?= $q['text']; ?></h4>

    <table>
        <?php
        $opt = $Que->all(['parent' => $q['id']]);
        foreach ($opt as $o) {
            $total=($q['count']==0)?1:$q['count'];
            $rate=$o['count']/$total;
        ?>
        <tr>
            <td width="50%"><?= $o['text']; ?></td>
            <td width="50%">
                <div class="bar" style="width:<?=round(80*$rate);?>%"></div>
                <?=$o['count'];?>票(<?=round($rate*100);?>%)
            </td>
        </tr>
        <?php } ?>
    </table>
    <div class="ct">
        <button onclick="location.href='index.php?do=que'">返回</button>
    </div>

</fieldset>