<fieldset>
    <legend>帳號管理</legend>
<form action="api/deluser.php" method="post">
    <table class="ct">
        <tr class="clo">
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
    <?php
    $users=$User->all();
    foreach($users as $u){
        if($u['acc']!='admin'){
    ?>
        <tr>
            <td><?=$u['acc'];?></td>
            <td><?=str_repeat("*",strlen($u['pw']));?></td>
            <td><input type="checkbox" name="del[]" value="<?=$u['id'];?>"></td>
        </tr>
    <?php } }?>
    </table>
    <div class="ct">
        <button type="submit">確定刪除</button><button type="reset">清空選取</button>
    </div>
</form>


    <h1>新增會員</h1>
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Steup4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">新增</button><button onclick="location.reload()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
function reg(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    let email=$("#email").val();
    let pw2=$("#pw2").val();
    if(acc==""||pw==""||pw2==""||email==""){
        alert("不可空白");
    }else if(pw != pw2){
        alert("密碼錯誤");
    }else{
        $.get("./api/chkacc.php",{acc},function(res){
            if(res==1){
                alert("帳號重覆");
            }else{
                $.post("./api/reg.php",{acc,pw,email},function(){
location.reload();
                })
            }
        })
    }
}
</script>