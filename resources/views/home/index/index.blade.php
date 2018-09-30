@extends('home.layouts.app')
@section('title')
   多媒体资讯
@stop
@section('content')
 <link rel="stylesheet" href="{{ asset('public/default/home/page/css/demo.css?d='.time()) }}">
 <div class="container" id="index">
    <div class="wrap-left pull-left">
        <div class="big-pic-box">
                @if(count($publish_article) == 3)
               
                    <div class="big-pic">
                        <a href="#" target="_blank" class="transition" title="{{$publish_article[0]->title}}">
                            <div class="back-img">
                                <img src="/public/uploads/{{$publish_article[0]->pic}}" alt="{{$publish_article[0]->title}}" width="533px;height:400px;">
                            </div>
                            <div class="big-pic-content">
                                <h1 class="t-h1">
                                    {{$publish_article[0]->title}}
                                </h1>
                            </div>
                        </a>
                    </div>
                    <div class="big2-pic big2-pic-index big2-pic-index-top">
                        <a href="#" class="back-img transition" target="_blank" title="  {{$publish_article[1]->title}}">
                            <img class="lazy" src="/public/uploads/{{$publish_article[1]->pic}}"
                            alt="{{$publish_article[1]->title}}">
                        </a>
                        <a href="#" target="_blank" title="  {{$publish_article[1]->title}}">
                            <div class="big2-pic-content">
                                <h2 class="t-h1">
                                     {{$publish_article[1]->title}}
                                </h2>
                            </div>
                        </a>
                    </div>
                    <div class="big2-pic big2-pic-index big2-pic-index-bottom">
                        <a href="#" class="back-img transition" target="_blank" title="{{$publish_article[2]->title}}">
                            <img class="lazy" src="/public/uploads/{{$publish_article[2]->pic}}"
                            alt="{{$publish_article[2]->title}}">
                        </a>
                        <a href="#" target="_blank" title="{{$publish_article[2]->title}}">
                            <div class="big2-pic-content">
                                <h2 class="t-h1">
                                    {{$publish_article[2]->title}}
                                </h2>
                            </div>
                        </a>
                    </div>
                @else
                11
                @endif
        </div>
        <div class="mod-info-flow">
           @foreach($article_list as $k=>$v)
                @if($v->article_pic_status =='small_picture')
                    <!--没图-->
                    <div class="mod-b mod-art" data-aid="213665">
                        @if($v->is_hot =='y')
                            <div class="mod-angle">
                                热
                            </div>
                        @endif
                       
                        <div class="mod-thumb ">
                            <a class="transition" title="{{$v->a_title}}" href="#" target="_blank">
                                <img class="lazy" src="/public/uploads/{{$v->pic}}"
                                alt="{{$v->a_title}}">
                            </a>
                        </div>
                        <div class="column-link-box">
                            <a href="#" class="column-link" target="_blank">
                                {{$v->title}}
                            </a>
                        </div>
                        <div class="mob-ctt">
                            <h2>
                                <a href="#" class="transition msubstr-row2" target="_blank">
                                     {{$v->a_title}}
                                </a>
                            </h2>
                            <div class="mob-author">
                                <div class="author-face">
                                    <a href="#" target="_blank">
                                        <img src="/public/uploads/{{$v->author_pic}}">
                                    </a>
                                </div>
                                <a href="#" target="_blank">
                                    <span class="author-name ">
                                        {{$v->author}}
                                    </span>
                                </a>
                                <a href="#" target="_blank" title="购买VIP会员">
                                </a>
                                <span class="time">
                                    {{tran_time(strtotime($v->add_time))}}
                                </span>
                                <i class="icon icon-cmt">
                                </i>
                                <em>
                                    {{$v->messages_number}}
                                </em>
                                <i class="icon icon-fvr">
                                </i>
                                <em>
                                   {{$v->browse_number}}
                                </em>
                            </div>
                            <div class="mob-sub" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;content: .....">
                                 {{$v->summary}}
                            </div>
                        </div>
                    </div>
                @elseif($v->article_pic_status =='big_picture')
                    <div class="mod-b mod-art mod-b-push ">
                        @if($v->is_hot =='y')
                            <div class="mod-angle">
                                热
                            </div>
                        @endif
                         <a class="transition" href="#" target="_blank" title=" {{$v->a_title}}">
                             <div class="mod-thumb ">
                                 <img class="lazy" src="/public/uploads/{{$v->pic}}"
                                 alt="{{$v->a_title}}">
                             </div>
                         </a>
                         <div class="column-link-box column-link-big-box">
                             <a href="#" class="column-link" target="_blank">
                                  {{$v->title}}
                             </a>
                         </div>
                         <div class="mob-ctt">
                             <h2>
                                 <a href="#" class="transition msubstr-row5" target="_blank">
                                     {{$v->a_title}}
                                 </a>
                             </h2>
                             <div class="mob-author">
                                 <div class="author-face">
                                     <a href="#" target="_blank">
                                         <img class="lazy" src="/public/uploads/{{$v->author_pic}}">
                                     </a>
                                 </div>
                                 <a href="#" target="_blank">
                                     <span class="author-name">
                                          {{$v->author}}
                                     </span>
                                 </a>
                                 <a href="#" target="_blank">
                                 </a>
                                 <span class="time">
                                    
                                      {{tran_time(strtotime($v->add_time))}}
                                 </span>
                             </div>
                             <div class="mob-sub" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:10;overflow: hidden;content: .....">
                                 {{$v->summary}}
                            </div>
                         </div>
                     </div>
                @elseif($v->article_pic_status =='no_picture')
                    <div class="mod-b mod-art promote">
                        <a href="#" target="_blank" title="">
                            <div class="mod-thumb">
                                <img class="lazy" src="/public/uploads/{{$v->author_pic}}" style='width:63px;height:63px;'>
                            </div>
                        </a>
                        <div class="mob-ctt">
                            <a href="#" title=" {{$v->a_title}}" target="_blank" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;overflow: hidden;content: .....">
                                {{$v->a_title}}
                            </a>
                            
                            <span class="span-mark-pro">
                                阅读全文
                            </span>
                        </div>
                    </div>
                @else
                @endif
                
           @endforeach
            
           <!--推广-->
            <div class="mod-b mod-art promote">
                <a href="#" target="_blank" title="">
                    <div class="mod-thumb">
                        <img class="lazy" src="/public/default/home/tpl/sy-img/233950517521.jpg">
                    </div>
                </a>
                <div class="mob-ctt">
                    <a href="#" target="_blank">
                        实体商业转型
                    </a>
                    <span class="point">
                        &bull;
                    </span>
                    <a href="#" target="_blank">
                        实体空间在召唤，他们押宝了零售业态转型升级
                    </a>
                    <span class="span-mark-pro">
                        推广
                    </span>
                </div>
            </div>
        </div>
        <div class=" demo">
            <div class="row pad-15">
                <div class="col-md-12">
                    <nav class="pagination-outer" aria-label="Page navigation">
                        <ul class="pagination">
                            @if($article_list->currentPage() == 1)
                            @else
                                <li class="page-item">
                                    <a href="{{url('?page=1')}}" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">首页</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="{{$article_list->previousPageUrl()}}" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">上一页</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="{{$article_list->previousPageUrl()}}">{{$article_list->currentPage()-1}}</a></li>
                            @endif
                             <li class="page-item active"><a class="page-link" href="#">{{$article_list->currentPage()}}</a></li>
                            @if($article_list->currentPage() == $article_list->lastPage())
                            @else
                                <li class="page-item">
                                    <a href="{{$article_list->nextPageUrl()}}" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">下一页</span>
                                    </a>
                                </li>
                               <li class="page-item">
                                    <a href="{{url('?page=').$article_list->lastPage()}}" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">末页</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
     
     <!----------------------------------------------------分割线--------------------------------------------------------------------------------->
    <div class="wrap-right pull-right">
        <div class="right-ad-box">
        </div>
        <link rel="stylesheet" type="text/css" href="https://static.huxiucdn.com/www/css/moment.css">
        <div id="moment">
        </div>
        <div class="box-moder moder-story-list">
            <h3>
                24小时
            </h3>
            <span class="pull-right project-more story-more">
                <a href="#" class="transition index-24-right js-index-24-right" target="_blank">
                    查看全部
                </a>
            </span>
            <span class="span-mark">
            </span>
            <div class="story-box-warp hour-box-warp">
                <div class="nano">
                    <div class="overthrow nano-content description" tabindex="0">
                        <ul class="box-list mt-box-list">
                            <!--公共24小时列表部分-->
                            @foreach($time24 as $v)
                            <li>
                                <div class="story-content">
                                    <div class="mt-story-title js-story-title" story-data-show="true">
                                        <p class="transition hour-arrow">
                                            <span class="icon icon-caret js-mt-index-icon">
                                            </span>
                                        </p>
                                        <ul class="hour-head">
                                            <li>
                                                <img class="hour-tx" src="/public/uploads/{{$v->author_pic}}"
                                                alt="头像">
                                            </li>
                                            <li>
                                                <p>
                                                    {{$v->author}}
                                                </p>
                                                <p>
                                                    {{tran_time($v->add_time_tamp)}}
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-index-info-parent">
                                        <div class="story-info mt-story-info">
                                            <p class="story-detail-hide hour-detail-hide mt-index-cont mt-index-cont2 js-mt-index-cont2" >
                                                #<span title="{{$v->summary}}" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 6;overflow: hidden;content: .....">{{$v->summary}}</span>
                                                <a href="#" target="_blank" class="mt-index-cont2-a">
                                                    [&nbsp原文&nbsp]
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="nano-pane">
                        <div class="nano-slider" style="height: 179px; transform: translate(0px, 0px);">
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-more-moment" data-cur_page="0">
            </div>
        </div>
        <div class="placeholder">
        </div>
        <!--24小时部分结束1-->
        <div class="ad-wrap">
            <div class="ad-title">
                广告
            </div>
        </div>
        <div class="placeholder">
        </div>
        <!--传言-->
        <!--传言部分开始-->
        <div id="rumor_center">
        </div>
        <div class="box-moder moder-rumors-list">
            <h3>
                传言
            </h3>
            <span class="span-mark">
            </span>
            <div class="big2-pic pull-right">
                <a href="#" class="back-img" target="_blank">
                    <img class="lazy" src="/public/default/home/tpl/sy-img/105108838520.jpg"
                    alt="">
                </a>
                <a href="https://chuanyan.huxiu.com/rumor/detail/684.html" target="_blank">
                    <div class="big2-pic-content">
                        <h2 class="t-h1">
                            传苹果和亚马逊正在竞购“007”品牌特许经营权
                        </h2>
                    </div>
                    <div class="clear">
                    </div>
                </a>
            </div>
            <div class="clear">
            </div>
            <ul class="rumorlist">
                <li>
                    <div class="icon-clock">
                        <img src="/public/default/home/tpl/images/clock.jpg" />
                    </div>
                    <p class="rumor-time">
                        09月07日 08:00
                    </p>
                    <p class="rumor-detail">
                        <a href="#" target="_blank">
                            美媒报道称，苹果和亚马逊正在竞购“007”詹姆斯·邦德品牌的特...
                        </a>
                    </p>
                </li>
            </ul>
            <div class="rumor-more">
                <p>
                    <a href="#" target="_blank">
                        详情>>
                    </a>
                </p>
            </div>
            <!--24小时不展示此按钮-->
            <div class="rumor-brunt-box">
                <a class="btn btn-blue-cy js-update-cy transition  js-show-bruntback-box1">
                    我要爆料
                </a>
            </div>
        </div>
        <div class="placeholder">
        </div>
        <!--传言部分结束-->
        <div class="ad-wrap">
            <div class="ad-title">
                广告
            </div>
        </div>
        <div class="placeholder">
        </div>
        <div class="box-moder moder-project-list">
            <h3>
                创业白板
            </h3>
            <span class="pull-right project-more">
                <a href="#" class="transition" target="_blank">
                    全部
                </a>
            </span>
            <span class="span-mark">
            </span>
            <ul>
                <li>
                    <div class="project-pic">
                        <img src="/public/default/home/tpl/sy-img/1503478306719861.png">
                    </div>
                    <div class="project-content">
                        <div class="project-title">
                            <a href="#" class="transition" target="_blank">
                                车悦宝
                            </a>
                        </div>
                        <p>
                            车载综合音频娱乐服务商
                        </p>
                    </div>
                </li>
                <li>
                    <div class="project-pic">
                        <img src="/public/default/home/tpl/sy-img/1503478306719861.png">
                    </div>
                    <div class="project-content">
                        <div class="project-title">
                            <a href="#" class="transition" target="_blank">
                                车悦宝
                            </a>
                        </div>
                        <p>
                            车载综合音频娱乐服务商
                        </p>
                    </div>
                </li>
                <li>
                    <div class="project-pic">
                        <img src="/public/default/home/tpl/sy-img/1503478306719861.png">
                    </div>
                    <div class="project-content">
                        <div class="project-title">
                            <a href="#" class="transition" target="_blank">
                                车悦宝
                            </a>
                        </div>
                        <p>
                            车载综合音频娱乐服务商
                        </p>
                    </div>
                </li>
                <li>
                    <div class="project-pic">
                        <img src="/public/default/home/tpl/sy-img/1503478306719861.png">
                    </div>
                    <div class="project-content">
                        <div class="project-title">
                            <a href="#" class="transition" target="_blank">
                                车悦宝
                            </a>
                        </div>
                        <p>
                            车载综合音频娱乐服务商
                        </p>
                    </div>
                </li>
                <li>
                    <div class="project-pic">
                        <img src="/public/default/home/tpl/sy-img/1503478306719861.png">
                    </div>
                    <div class="project-content">
                        <div class="project-title">
                            <a href="#" class="transition" target="_blank">
                                车悦宝
                            </a>
                        </div>
                        <p>
                            车载综合音频娱乐服务商
                        </p>
                    </div>
                </li>
            </ul>
            <div class="project-btn-box">
                <a class="js-open-cy btn btn-blue-cy transition">
                    立即报名，获得曝光机会！
                </a>
            </div>
            <ul class="project-info">
                <li>
                    创业公司立即报名提交信息的好处：
                </li>
                <li>
                    1.优质的展示和访谈机会
                </li>
                <li>
                    2.获得投资人的关注
                </li>
                <li>
                    3.虎嗅提供的创业支持服务
                </li>
            </ul>
        </div>
        <div class="placeholder">
        </div>
        <div class="box-moder moder-project-list promote-box">
            <h3>
                赞助内容
            </h3>
            <span class="span-mark">
            </span>
            <ul>
                <li>
                    <div class="mod-thumb">
                        <a href="#" target="_blank">
                            <img src="/public/default/home/tpl/sy-img/233950517521.jpg">
                        </a>
                    </div>
                    <div class="project-content">
                        <a href="#" class="c2" target="_blank">
                            实体商业转型
                        </a>
                        <span class="point">
                            &bull;
                        </span>
                        <a href="#" target="_blank">
                            实体空间在召唤，他们押宝了零售业态转型升级
                        </a>
                    </div>
                </li>
                <li>
                    <div class="mod-thumb">
                        <a href="#" target="_blank">
                            <img src="/public/default/home/tpl/sy-img/233950517521.jpg">
                        </a>
                    </div>
                    <div class="project-content">
                        <a href="#" class="c2" target="_blank">
                            实体商业转型
                        </a>
                        <span class="point">
                            &bull;
                        </span>
                        <a href="#" target="_blank">
                            实体空间在召唤，他们押宝了零售业态转型升级
                        </a>
                    </div>
                </li>
                <li>
                    <div class="mod-thumb">
                        <a href="#" target="_blank">
                            <img src="/public/default/home/tpl/sy-img/233950517521.jpg">
                        </a>
                    </div>
                    <div class="project-content">
                        <a href="#" class="c2" target="_blank">
                            实体商业转型
                        </a>
                        <span class="point">
                            &bull;
                        </span>
                        <a href="#" target="_blank">
                            实体空间在召唤，他们押宝了零售业态转型升级
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="placeholder">
        </div>
        <!--研究报告部分开始-->
        <div class="box-moder hot-article">
            <h3>
                创新案例
            </h3>
            <span class="pull-right project-more story-more">
                <a href="#" class="transition" target="_blank">
                    全部
                </a>
            </span>
            <span class="span-mark">
            </span>
            <ul>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        【经济学人】比特币内战打响，加密货币走到分岔路口
                    </a>
                    <div class="report-author-info" style="margin-left:0px;margin-top:0px;">
                        <span class="author-face">
                            <img src="/public/default/home/tpl/sy-img/97.jpg">
                        </span>
                        <span>
                            虎嗅会员小秘书
                        </span>
                        <div style="margin-left: 40px;margin-top: 5px;">
                            微信号：huxiuvip302
                        </div>
                    </div>
                </li>
            </ul>
            <div class="report-explain">
                全年30+篇 案例分析，复盘有代表性的创新公司，还原商业成功背后的魔鬼细节。
            </div>
        </div>
        <div class="placeholder">
        </div>
        <div class="box-moder hot-article">
            <h3>
                热文
            </h3>
            <span class="span-mark">
            </span>
            <ul>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank" title="华谊：老了，还花心">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        华谊：老了，还花心
                    </a>
                </li>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank" title="华谊：老了，还花心">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        华谊：老了，还花心
                    </a>
                </li>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank" title="华谊：老了，还花心">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        华谊：老了，还花心
                    </a>
                </li>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank" title="华谊：老了，还花心">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        华谊：老了，还花心
                    </a>
                </li>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank" title="华谊：老了，还花心">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        华谊：老了，还花心
                    </a>
                </li>
                <li>
                    <div class="hot-article-img">
                        <a href="#" target="_blank" title="华谊：老了，还花心">
                            <img src="/public/default/home/tpl/sy-img/105108838520.jpg">
                        </a>
                    </div>
                    <a href="#" class="transition" target="_blank">
                        华谊：老了，还花心
                    </a>
                </li>
            </ul>
        </div>
        <div class="placeholder">
        </div>
    </div>
</div>
@stop


