<li class="{{ Request::segment(2) == 'home' ? 'active' : null  }}">
    <a href="{{ route('backend.home') }}">
        <i class="fa fa-home"></i> <span>Trang chủ</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'users' ? 'active' : null  }}">
    <a href="{{ route('users.index') }}">
        <i class="fa fa-user"></i> <span>Tài khoản</span>
    </a>
</li>

<li class="{{ Request::segment(2) == 'member' ? 'active' : null  }}">
    <a href="{{ route('member.index') }}">
        <i class="fa fa-user"></i> <span>Thành viên</span>
    </a>
</li>

<li class="treeview {{ Request::segment(2) === 'category' || Request::segment(2) === 'products' || Request::segment(2) === 'category-filter' || Request::segment(2) === 'filter' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Sản phẩm</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'products' ? 'active' : null }}">
            <a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> Sản phẩm</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' ? 'active' : null }}">
            <a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Danh mục</a>
        </li>
        <li class="{{ Request::segment(2) === 'category-filter' ? 'active' : null }}">
            <a href="{{ route('list-category-filter') }}"><i class="fa fa-circle-o"></i> Bộ lọc</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::segment(2) === 'category-rooms' || Request::segment(2) === 'rooms' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Rooms</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'rooms' ? 'active' : null }}">
            <a href="{{ route('rooms.index') }}"><i class="fa fa-circle-o"></i> Danh sách</a>
        </li>
        <li class="{{ Request::segment(2) === 'category-rooms' ? 'active' : null }}">
            <a href="{{ route('category-rooms.index') }}"><i class="fa fa-circle-o"></i> Danh mục</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::segment(2) === 'category-collection' || Request::segment(2) === 'collection' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Collection</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'collection' ? 'active' : null }}">
            <a href="{{ route('collection.index') }}"><i class="fa fa-circle-o"></i> Danh sách</a>
        </li>
        <li class="{{ Request::segment(2) === 'category-collection' ? 'active' : null }}">
            <a href="{{ route('category-collection.index') }}"><i class="fa fa-circle-o"></i> Danh mục</a>
        </li>
    </ul>
</li>

<li class="{{ Request::segment(2) == 'pages' ? 'active' : null  }}">
    <a href="{{ route('pages.list') }}">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Cài đặt trang</span>
    </a>
</li>

<li class="header">Cấu hình hệ thống</li>
<li class="treeview {{ Request::segment(2) === 'options' || Request::segment(2) === 'image' || Request::segment(2) === 'menu' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> <span>Cấu hình</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

         <li class="{{ Request::segment(3) === 'general' ? 'active' : null }}">
            <a href="{{ route('backend.options.general') }}"><i class="fa fa-circle-o"></i> Cấu hình chung</a>
        </li>

        <li class="{{ request()->get('type') == 'slider' ? 'active' : null }}">
            <a href="{{ route('image.index', ['type'=> 'slider']) }}"><i class="fa fa-circle-o"></i> Slider</a>
        </li>

        <li class="{{ Request::segment(2) === 'menu' ? 'active' : null }}">
            <a href="{{ route('setting.menu') }}"><i class="fa fa-circle-o"></i> Menu</a>
        </li>
        <li class="{{ Request::segment(3) == 'developer-config' ? 'active' : null  }}">
            <a href="{{ route('backend.options.developer-config') }}"><i class="fa fa-circle-o"></i> Developer - Config</a>
        </li>
    </ul>
</li>
