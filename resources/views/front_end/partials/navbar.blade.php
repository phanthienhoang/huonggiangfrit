<nav>

    <ul id="navigation">                                                                                                                                     
        <li><a href="/">{{trans('navbar.home')}}</a></li>
        <li><a href="#">{{trans('navbar.introduce')}}</a>
            <ul class="submenu">
                <li><a href="blog.html">Giới thiệu chung</a></li>
                <li><a href="single-blog.html">Bộ máy quản lý</a></li>
                <li><a href="single-blog.html">Cơ cấu tổ chức</a></li>
            </ul>
        </li>
        <li><a href="#">CATALOGUE</a>
            <ul class="submenu">
                <li><a href="blog.html">Chỉ tiêu lý hóa frit</a></li>
                <li><a href="single-blog.html">Thông tin kĩ thuật frit</a></li>
                <li><a href="single-blog.html">Chỉ tiêu kĩ thuật engobe</a></li>
            </ul>
        </li>
        <li><a href="#">{{trans('navbar.product')}}</a>
            <ul class="submenu">
            @foreach($loai_sp as $key=>$value)
                <li><a href="blog.html">{{$value->name}}</a></li>
                <!-- <li><a href="single-blog.html">Frit đục</a></li>
                <li><a href="single-blog.html">Frit bán đục</a></li>
                <li><a href="single-blog.html">Frit matt</a></li>
                <li><a href="single-blog.html">Frit điều chỉnh</a></li>
                <li><a href="single-blog.html">Frit titan</a></li> -->
            @endforeach
            </ul>
        </li>
        <li><a href="#">{{trans('navbar.news')}}</a>
            <ul class="submenu">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="single-blog.html">Blog Details</a></li>
            </ul>
        </li>
        <li><a href="#">{{trans('navbar.shareholder')}}</a>
            <ul class="submenu">
            @foreach($quanhe_codong as $key=>$value)
                <li><a href="contact.html">{{$value->title}}</a></li>
                <!-- <li><a href="elements.html">Element</a></li> -->
                @endforeach
            </ul>
        </li>
        <li><a href="#">{{trans('navbar.photolibrary')}}</a></li>
        <li><a href="#">{{trans('navbar.hiring')}}</a></li>
        <li><a href="#">{{trans('navbar.contact')}}</a></li>

    </ul>
</nav>