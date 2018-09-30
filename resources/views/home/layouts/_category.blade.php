<ul class="nav navbar-nav navbar-left" id="jsddm">
    @foreach($menu as $v)
        @if($v['list'])
        <li class="nav-news js-show-menu">
            <a href="/category/{{encrypt($v['id'])}}">
                {{$v['title']}}
                <span class="caret">
                </span>
            </a>
            <ul>
                @foreach($v['list'] as $child)
                <li>
                    <a href="/category/{{encrypt($child['id'])}}" target="_blank">
                        {{$child['title']}}
                    </a>
                </li>
                @endforeach

            </ul>
        </li>
        @else
        <li class="nav-news">
            <a href="/category/{{encrypt($v['id'])}}" target="_blank">
                 {{$v['title']}}
            </a>
        </li>
        @endif
    
    
    @endforeach
    
    <style>
        #jsddm ul{position: absolute; visibility: hidden; background:#fff; width:250px;
        top:60px; left:-50px; z-index:9999; box-shadow:0 1px 15px rgba(18,21,21,.2);padding:10px
        5px;} #jsddm ul li{ float:left; width:105px; padding-left:20px; line-height:40px;}
    </style>
<!--    <li class="nav-news">
        <a href="#" target="_blank">
            热议
            <span class="nums-prompt nums-prompt-topic">
            </span>
        </a>
    </li>
    <li class="nav-news">
        <a href="#" target="_blank">
            活动
        </a>
    </li>
    <li class="nav-news">
        <a href="#" target="_blank">
            创业白板
            <span class="nums-prompt">
            </span>
        </a>
    </li>
    <li class="nav-news">
        <a href="#" target="_blank">
            会员专享
            <em class="nums-prompt">
            </em>
        </a>
    </li>
    <li class="nav-news">
        <a href="#" target="_blank">
            官方Blog
        </a>
    </li>-->
</ul>