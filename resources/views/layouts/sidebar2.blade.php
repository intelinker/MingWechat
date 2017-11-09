<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="list-group-item {{ (Request::is('/') || Request::is('articles*') ? 'active' : '') }}"> <a href="{{ url('/') }}"><i class="fa fa-files-o fa-fw"></i> 文章管理 </a></li>

            <li class="list-group-item {{ (Request::is('*history') ? 'active' : '') }}"><a href="{{ url('admin/history') }}"> <i class="fa fa-files-o fa-fw"></i>座位设置</a></li>

            <li class="list-group-item {{ (Request::is('*history') ? 'active' : '') }}"><a href="{{ url('admin/history') }}"> <i class="fa fa-files-o fa-fw"></i>订单管理</a></li>
        </ul>
    </div>
</div>