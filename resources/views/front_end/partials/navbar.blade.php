<nav>

    <ul id="navigation">                                                                                                                                     
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Giới thiệu</a>
            <ul class="submenu">
                <li><a href="blog.html">Giới thiệu chung</a></li>
                <li><a href="single-blog.html">Bộ máy quản lý</a></li>
                <li><a href="single-blog.html">Cơ cấu tổ chức</a></li>
            </ul>
        </li>
        <li><a href="#">Catalogue</a>
            <ul class="submenu">
                <li><a href="blog.html">Chỉ tiêu lý hóa frit</a></li>
                <li><a href="single-blog.html">Thông tin kĩ thuật frit</a></li>
                <li><a href="single-blog.html">Chỉ tiêu kĩ thuật engobe</a></li>
            </ul>
        </li>
        <li><a href="#">Sản phẩm</a>
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
        <li><a href="#">Tin tức</a>
            <ul class="submenu">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="single-blog.html">Blog Details</a></li>
            </ul>
        </li>
        <li><a href="#">Quan hệ cổ đông</a>
            <ul class="submenu">
            @foreach($quanhe_codong as $key=>$value)
                <li><a href="contact.html">{{$value->title}}</a></li>
                <!-- <li><a href="elements.html">Element</a></li> -->
                @endforeach
            </ul>
        </li>
        <li><a href="#">Thư viện ảnh</a></li>
        <li><a href="#">Tuyển dụng</a></li>
        <li><a href="#">Liên hệ</a></li>

    </ul>
</nav>