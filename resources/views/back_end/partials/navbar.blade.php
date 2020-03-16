<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- ===================================CHANGE LANGUEGE=============================================== -->
  <div style="margin:auto;" id="language_id">
    <!-- <select name="" id="">
       <option value="Tiếng ANH">  <a style='a:visited:color:red' href="{{ route('user.change-language',['en'])}}" ><img src='/assets/icon-en.png'/>Tiếng ANh</a>
      </option>
      <option value="Tiếng ANH">  <a style='a:visited:color:red' href="{{ route('user.change-language',['en'])}}" ><img src='/assets/icon-en.png'/>Tiếng Việt</a>
      </option>
    </select> -->
    <a style='a:visited:color:red' href="{{ route('user.change-language',['en'])}}" ><img src='/assets/icon-en.png'/></a>
    <a style='a:visited:color:red' href="{{ route('user.change-language',['vi'])}}" ><img src='/assets/icon-vn.png'/></a>
  </div>
  

  <!-- ================================================================================================== -->

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>

  </ul>
</nav>