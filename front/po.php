<style>
    .contain {
        display: flex;
    }

    #b1 {
        width: 15%;
    }

    #b2 {
        width: 70%;
    }
</style>

目前位置：首頁 >分類網誌> <span id="nav"></span>
<div class="contain">

    <fieldset id="b1">
        <legend>分類網誌</legend>
        <div class="tags" id="1">健康新知</div>
        <div class="tags" id="2">菸害防治</div>
        <div class="tags" id="3">癌症防治</div>
        <div class="tags" id="4">慢性病防治</div>
    </fieldset>
    <fieldset id="b2">
        <legend>文章列表</legend>
        <div id="list"></div>
    </fieldset>
</div>
<script>
    getList(1);
    nav(1);
    $(".tags").on("click", function() {
        let id = $(this).attr("id");
        nav(id);
        getList(id);
    })

    function nav(id) {
        let text = $("#" + id).html();
        $("#nav").html(text);
    }

    function getList(type) {
        $.get("api/getlist.php", {
            type
        }, function(list) {
            $("#list").html(list);
        })
    }

    function getNews(id) {
        $.get("api/getnews.php", {
            id
        }, function(news) {
            $("#list").html(news);
        })
    }
</script>