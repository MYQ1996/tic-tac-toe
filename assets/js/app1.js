// js中前端和后端交互的一种方法
// ajax
// 上传数据和下拉数据
// jq
// ajax
// 1.post 表单传值
// 2.get 问好传值

// var dizhi= "http://localhost:8080/";
// ajax方法
function ajaxp(val, url, caozuo) {
    $.ajax({
        type: "POST",
        data: val,
        dataType: 'json',
        url: "Cont/"+ url,
        processData: false,
        contentType: false,
        async:true,//异步
        success: function (data) {
            caozuo(data);
        }, error: function () {
            alert("连接失败");
        }
    })
}

function ajaxg(val, url, caozuo) {
    $.ajax({
        type: "GET",
        data: val,
        dataType: 'json',
        url: "Cont/"+ url,
        processData: false,
        contentType: false,
        async:true,
        success: function (data) {
            caozuo(data);
        }, error: function () {
            alert("连接失败");
        }
    })
}


function gaofeng() {
    var a ="";
    ajaxp(a,"gaofenbang.php",function (data) {
        // console.log(data);
        var height="";
        var heightf="";

        for(a=0;a<data.length;a++){
            var time =new Date(data[a].startime*1000).toLocaleDateString();
            height="<article class=\"score\"><h4 class=\"pos\">1</h4><h4 class=\"name-high\">"+data[a].name+" <span class=\"moves\"><span>"+data[a].o+"</span>-<span>"+data[a].x+"</span></span></h4><p><span class=\"date-high\">"+time+"</span><span class=\"time-high\">60 sec</span></p></article>\n";
            heightf = height+heightf;
        }


        $(".scroll-view").html(heightf);

    })
}

$(document).ready(function () {
    gaofeng();
})

function play(a) {
    var xia = "xia="+a;
    ajaxg(xia,"play.php",function (data) {
        // console.log(data);

    })
    
}

function nickname2() {
    var nickname=new FormData($("#nickname2")[0]);
    ajaxp(nickname,"name.php",function (data) {
        console.log(data);
    })
}

