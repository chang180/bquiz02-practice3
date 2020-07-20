<?php
$q = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $q['text']; ?></span></legend>
    <h4><?= $q['text']; ?></h4>
    <form action="api/vote.php?id=<?=$_GET['id'];?>" method="post">
        <?php
        $opt = $Que->all(['parent' => $q['id']]);
        foreach ($opt as $o) {
        ?>
            <div><input type="radio" name="opt" value="<?= $o['id']; ?>"><?= $o['text']; ?></div>
            <?php } ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>

</fieldset>