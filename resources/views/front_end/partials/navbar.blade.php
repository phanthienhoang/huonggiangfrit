<nav>
    <ul id="navigation">
        <li><a href="/">{{trans('navbar.home')}}</a></li>
        <li><a href="{{route('about.web')}}">{{trans('navbar.introduce')}}</a>
        </li>
        <li><a href="#">{{trans('navbar.product')}}</a>
            <ul class="submenu">
            @foreach($loai_sp as $key=>$value)
                <li><a href="{{route('category.web', $value->slug)}}">{{$value->name}}</a></li>
            @endforeach
            </ul>
        </li>
    <li><a href="{{route('news.web')}}">{{trans('navbar.news')}}</a>
        </li>

        <li><a href="{{route('hiring.web')}}">{{trans('navbar.hiring')}}</a></li>
        <li><a href="/contact">{{trans('navbar.contact')}}</a></li>
    </ul>
</nav>
