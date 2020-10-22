<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
        </div>
    </div>
    <ul class="app-menu">

        <li><a class="app-menu__item " href="{{route('dashboard.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item " href="{{route('dashboard.categories.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>




        <li><a class="app-menu__item " href="{{route('dashboard.post.index')}}"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Posts</span></a></li>



        <li><a class="app-menu__item " href="{{route('dashboard.user.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>


        <li><a class="app-menu__item " href="{{route('dashboard.comments.index')}}"><i class="app-menu__icon  fa fa-comments-o" aria-hidden="true"></i><span class="app-menu__label">Comments</span></a></li>











        {{--
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>--}}
{{--            <ul class="treeview-menu" data-toggle="dropdown">--}}
{{--                <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>--}}
{{--                <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>--}}
{{--                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>--}}
{{--                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        </ul>
</aside>
