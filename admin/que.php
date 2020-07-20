<fieldset>
    <legend>新增問卷</legend>
    <form method="post" action="api/addque.php">
        <table>
            <tr id="more">
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="subject"></td>
            </tr>
            <tr>
                <td colspan="2" class="clo">
                    選項<input type="text" name="option[]">
<button type="button" onclick="moreOpt()">更多</button>
            </td>
            </tr>
        </table>
        <input type="submit" value="新增"></input><input type="reset" value="清空"></input>
    </form>
</fieldset>
<script>
    function moreOpt(){
        let el=`
        <tr>
        <td colspan="2" class="clo">
                    選項<input type="text" name="option[]">
            </td>
            </tr>
        `;
$("#more").after(el);
    }
</script>