/* put any js-code here */
//存cookie
function setk(val) {
    document.cookie='key='+val;
}
//取cookie
function getk() {
    return document.cookie.split('=')[1];
}
//刷新页面时调用fg
$(document).ready(function () {
    fg();
    gaofengbang();
})

//ajax get方法
function ajaxg(url,val,caozuo) {
    $.ajax({
        type:'GET',
        data:val,
        dataType:"json",
        url:'Cont/'+url,
        contentType:false,
        processData:false,
        success:function (data) {
            caozuo(data)
        }, error:function () {
            alert(url+"  ajax交互失败！")
        }
    })
}

//ajax post方法
function ajaxp(url,val,caozuo) {
    $.ajax({
        type:'POST',
        data:val,
        dataType:"json",
        url:'Cont/'+url,
        contentType:false,
        processData:false,
        success:function (data) {
            caozuo(data)
        }, error:function () {
            alert(url+"  ajax交互失败！")
        }
    })
}


//保持图片
function uploadimg() {
    var imgform=new FormData($('#touxiang')[0]);
    ajaxp('saveimg.php',imgform,function(data){
        // alert(data.msg);
        if (data.msg=="ok"){
            setk(1);
            // 开始棋局
            fg();
        }else {
            $("#error").show();
        }

    });
}

//高峰榜
function gaofengbang() {
    var a='';
    ajaxg('gaofenbang.php',a,function (data) {
        console.log(data);
        var hightb="";
        for(i=0;i<data.length;i++){
            var time=new Date(data[i].startime*1000).toLocaleDateString();
            $('.pos').css('background','url('+data[i].touxiang.substring(3)+')');
            var pai =i+1;
            var hightf='<article class="score"> <h4 class="pos">'+pai+'</h4><h4 class="name-high">'+data[i].name+ '<span class="moves"><span>'+data[i].o+'</span>-<span>'+data[i].x+'</span></span></h4> <p><span class="date-high">'+time+'</span><span class="time-high">'+data[i].zuitime+' sec</span></p> </article>';

            hightb = hightb + hightf;
            $(".scroll-view").html(hightb);


        }



    })

}

//下拉游戏过程
function fg() {
    var flg=getk();
    // console.log(flg);
    var imgform='';
    ajaxp('fg.php',imgform,function(data){
        console.log(data);
        //取时间
        $(".time").html(data.zuitime +'sec');

        //取步数
        $("#player").html(data.o );
        $("#computer").html(data.x );

        //判断游戏过程

        if(flg==1) {
            $("#uploads").hide();
            $("#game").show();
             if(data.win == 1){
                $("#time").hide();
                $(".win").show();
                setk(1);
                //锁定棋局
                suo();
            }else if(data.win == 2){
                $("#time").hide();
                $(".lose").show();
                setk(1);
                 //锁定棋局
                suo();
            } else if (data.win == 3) {
                 $("#time").hide();
                 $(".ping").show();
                 setk(1);
                 //锁定棋局
                 suo();
             }else {
                $("#time").show();
                $(".win").hide();
                $(".lose").hide();
                 //解锁棋局
                jiesuo();
            }

            //棋盘
            xiaqi(data.qiju);
            //刷新玩家的头像
            $('.o').css('background','url('+data.touxiang+')');

        }else {
            //上传出现
            $("#uploads").show();
            //游戏消失
            $("#game").hide();
        }
    });

}

//下棋
function xiaqi(ju) {
    for (i=1;i<10;i++){
        if(ju[i]==1){
            $("#"+i).addClass("o");
            $("#" + i).attr("disabled", true);
        }else if(ju[i]==2){
            $("#"+i).addClass("x");
            $("#" + i).attr("disabled", true);
        }else if(ju[i]==0){
            $("#"+i).removeClass("o");
            $("#"+i).removeClass("x");
        }
    }
}

//重新开始游戏
function start() {
    setk(0);
    var qiju='';
    ajaxg('start.php',qiju,function (data) {
        fg();
    });


}

//下棋的位置上传
function play(a) {
    suo();
    var xia = 'xia='+a;
    $("#"+a).addClass("o");
    ajaxg('play.php',xia,function (data) {
        fg();
    });
}
//锁定棋局
function suo() {
    for(a=1;a<10;a++)
    {
        $("#" + a).attr("disabled", true);
    }
}
//解锁棋局
function jiesuo() {
    for(a=1;a<10;a++)
    {
        if ($("#" + a).hasClass('.o')||$("#" + a).hasClass('.x')){

        }else {
            $("#" + a).attr("disabled", false);

        }
    }
}

function username() {
    var name=new FormData($('#username')[0]);
    console.log(name);
    if($("#nickname").val()==""||$("#nickname").val()==undefined){
        $("#name").show();
    }else {
        ajaxp('name.php',name,function(data){
            start();
        });
    }
}