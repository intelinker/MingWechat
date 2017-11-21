<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="list-group-item {{ (Request::is('/') || Request::is('articles*') ? 'active' : '') }}"> <a href="{{ url('/') }}"><i class="fa fa-files-o fa-fw"></i> 文章管理 </a></li>

            <li class="list-group-item {{ (Request::is('theatres*') ? 'active' : '') }}"><a href="{{ url('theatres') }}"> <i class="fa fa-files-o fa-fw"></i>剧场管理</a></li>

            <li class="list-group-item {{ (Request::is('scenes*') ? 'active' : '') }}"><a href="{{ url('scenes') }}"> <i class="fa fa-files-o fa-fw"></i>场次管理</a></li>

            <li class="list-group-item {{ (Request::is('orders*') ? 'active' : '') }}"><a href="{{ url('orders') }}"> <i class="fa fa-files-o fa-fw"></i>订单管理</a></li>
        </ul>
    </div>
</div>