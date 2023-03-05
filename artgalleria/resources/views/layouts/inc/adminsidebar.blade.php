<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
         ARTGALLERIA
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('dashboard') ? 'active':''}} ">
            <a class="nav-link" href="./dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('kategori') ? 'active':''}} ">
            <a class="nav-link" href="{{url('kategori')}}">
              <i class="material-icons">category</i>
              <p>Kategori</p>
            </a>
          </li>
            <li class="nav-item {{Request::is('kategori_ekle') ? 'active':''}} ">
                <a class="nav-link" href="{{url('kategori_ekle')}}">
                    <i class="material-icons">category</i>
                    <p>Kategori Ekle</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('urunler') ? 'active':''}} ">
                <a class="nav-link" href="{{url('urunler')}}">
                    <i class="material-icons">shopping_cart</i>
                    <p>Ürünler</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('urun_ekle') ? 'active':''}} ">
                <a class="nav-link" href="{{url('urun_ekle')}}">
                    <i class="material-icons">shopping_cart</i>
                    <p>Ürün Ekle</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('siparisler') ? 'active':''}} ">
                <a class="nav-link" href="{{url('siparisler')}}">
                    <i class="material-icons">receipt_long</i>
                    <p>Siparişler</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('kullanicilar') ? 'active':''}} ">
                <a class="nav-link" href="{{url('kullanicilar')}}">
                    <i class="material-icons">group</i>
                    <p>Kullanıcılar</p>
                </a>
            </li>
        </ul>
      </div>
    </div>
