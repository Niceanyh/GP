$(function(){
  $.ajax({
    url:"./header.html",
    type:"get",
    success:function(res){
      //动态添加<link>到<head>元素中，自动引入header.css
      // $("<link rel='stylesheet' href='css/header.css'>").appendTo("head");
      //用接收到的片段代替页面上空的<header>
      $(res).replaceAll("#header");   

      var atURL = window.location.pathname//获取地址栏的URl
      var atURL = substr(atURL)//正则过滤 获取html 名字
      // console.log(atURL)
      var navs = $(".navbar ul>li a")
      for(var item of  navs ){//遍历
        var presentURL=substr($(item).attr("href"))//获取ul>li>a的URL
        if( atURL == presentURL ){
          $(item).parent().addClass("active")//父元素 li  class="active" 
        }
      }

      //退出登录
      $(".navbar ul.member li:last a").click(function(event){
        event.preventDefault();
        $.ajax({
          // xhrFields: {withCredentials: true},crossDomain: true,
          url:"http://localhost:8080/quitLogin",
          type:"get",
          success:function(res){
            console.log(res)
            console.log("66")
          }
        })
      });


      var urlobj = new URLSearchParams(location.search);//获取q内容
      var q = urlobj.get("q");
      if(atURL=="search"){//赋值为编辑框
        $(".search-box").val(q)
      }


      $(".search-box").on("focus",function(e){//编辑框获取焦点 清空内容
        e.preventDefault()
        $(this).val("")
      })


      $(".search-but").click(function(event){
        event.preventDefault();
        var q =  $(".search-box").val()
        if (q===null||q===undefined||q==""){
          alert("搜索内容不能为空！")
        }else{
          window.location.href="./search.html?q=" + q
        }
       
      });
      
      function isLogin(){//判断是否登录的函数
        $.ajax({
          crossDomain:true, //设置跨域为true
          xhrFields: {
            withCredentials: true //默认情况下，标准的跨域请求是不会发送cookie的
          },
          url:"http://localhost:8080/isLogin" ,
          type:"get",
          success:function(res){
            console.log(res)
    
            if(res.code==-1){
              $(".navbar ul.member li:lt(2)").removeClass("d-none")
            }else{
              $(".navbar ul.member li:gt(1)").removeClass("d-none")//
              $(".navbar ul.member li:eq(2) a").html("你好！"+res.uname)//修改用户昵称
              if(atURL=="login"){//如果已登录避开登录页面
                window.location.href="./index.html"
              }
            }
          }
        })
      }
      isLogin()
    }
  })

  
 function substr(url){
    if(url==''||url==null||url==undefined){
      return ''
    }
    var substr = url.match(/\/(\S*).htm/);
    return substr[1]
 }

})//$结束


