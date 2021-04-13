$(function(){
  // var getreq = window.location.search//获取地址栏的 req
  // getreq = decodeURI(getreq)//url解码
  var year,rating,country,tag//声明变量 初始化原始数据内容
  var page= 1
  var getreq =""//静态加载
  if(getreq ==""){//静态不刷新网站没有url req 
    getreq="?year=全部&rating=全部&country=全部&tag=全部&page=1"
  }
  //解析地址栏的url的req 保存到不同变量
  getreqs= getreq.split("&")//分割内容 
  year  =   getreqs[0]===undefined?"?year=全部":getreqs[0] //如果没有那么就等于all
  rating =  getreqs[1]===undefined?"rating=全部":getreqs[1]
  country = getreqs[2]===undefined?"country=全部":getreqs[2]
  tag =     getreqs[3]===undefined?"tag=全部":getreqs[3]
  
  //分页
  $('.paging .pagination').jqPaginator({
    totalPages: 3,//总页数
    visiblePages: 5,//显示数
    currentPage: 1,//当前页数
    first:'<li class="page-item first"><a class="page-link" href="javascript:;">首页</a></li>',//首页
    prev: '<li class="page-item prev"><a class="page-link" href="javascript:;"><</a></li>',//上一页
    next: '<li class="page-item next"><a class="page-link" href="javascript:;">></a></li>',//下一页样式
    last: '<li class="page-item last"><a class="page-link" href="javascript:;">末页</a></li>',//末页样式
    page: '<li class="page-item page"><a class="page-link" href="javascript:;">{{page}}</a></li>',//页码样式
    onPageChange:  (num, type)=>{
      page=num//赋值页码
      console.log('当前第' + page + '页')
      mreq();
    }
  });

  $(".tags .tag a").click(function(event){//筛选被点击
    event.preventDefault();
    var gethref= $(this).attr("href").split("?")[1]//获取点击的url的req
    if(gethref.search("year")!=-1){//找到对应的 变量然后写入
      year = "?"+gethref//第一个要加问号
    }else if(gethref.search("rating")!=-1){
      rating = gethref
    }else if(gethref.search("country")!=-1){
      country = gethref
    }else if(gethref.search("tag")!=-1){
      tag = gethref
    }

    //添加class
    var a = $(".tags .tag a")
    a.removeClass("active")//移除现有的class
    //添加class
    for(var item of a){
      //console.log($(item).attr("href").search(year))
      //console.log(year)
      var valyear =year.replace(/[\?]/ig,"")
      if($(item).attr("href").search(valyear) !=-1 ){//年份
        $(item).addClass("active")
      }
      var valrating =rating.replace(/[\?]/ig,"")
      if($(item).attr("href").search(valrating) !=-1 ){//评分
        $(item).addClass("active")
      }
      var valcountry =country.replace(/[\?]/ig,"")
      if($(item).attr("href").search(valcountry) !=-1 ){//国际
        $(item).addClass("active")
      }
      var valtag =tag.replace(/[\?]/ig,"")
      if($(item).attr("href").search(valtag) !=-1 ){//类型
        $(item).addClass("active")
      }
    }

    page = 1//筛选之后重置页数
    $('.paging .pagination').jqPaginator('option', {
      currentPage: 1,//当前页数
    });

    mreq()//发送请求
    // window.location.href="./movie.html" + getreq
    //不刷新静态加载
  })
  function bzda(){
    console.log("1")
    
  }
  function mreq(){
    getreq =`${year}&${rating}&${country}&${tag}&page=${page}`//拼接数据
    console.log(getreq)
    $.ajax({
      url:`http://localhost:8080/movie`+getreq,
      type:"get",
      success:function(res){
        //console.log(res.data)
        var list =res.data 
        var htmlBox = ""
        for(var item of list ){
          var html = `
          <div class="movie-item ">
            <div class="movie-item-box" title="${item.vname}"  >
              <div class="movie-img">
                <a target="_blank" href="./details.html?vid=${item.vid}"><div class="movie-show"><img src="./img/movie/0a_player.png"></div></a>
                <img src="${item.img_url}" alt="">
              </div>
              <div class="meta">
                <a target="_blank" href="./details.html?vid=${item.vid}">${item.vname}<span>--${item.rating}分</span></a>
                <div>类型:${item.type}</div>
              </div>
            </div>
          </div>`
          htmlBox += html
        }
       //console.log(htmlBox)

       $("div.paging>div").html(`${res.page}/${res.pageCount}页`)//page当前页  pageCount总页数

       htmlBox=`<div class="movie-box">${htmlBox}</div>`
        $(htmlBox).replaceAll(".movie-box");  //替换  
          
        if(list.length==0){
          $(".jumbotron").removeClass("d-none") //移除
          
        }else{
          $(".jumbotron").addClass("d-none") //加入
        }
        if(res.pageCount == 0||res.pageCount == 1){//没有数据 或者数据只有一页 隐藏分页列表
          $('.paging').addClass("d-none")
        }else{
          $('.paging .pagination').jqPaginator('option', {
            //currentPage: res.page,//当前页数
            totalPages: res.pageCount//总页数  给返回回来的数据
          });
        }
        
      }
    }) 
  }
})
