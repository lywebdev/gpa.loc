<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Меню</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
{{--                        <i class="ri-share-line"></i>--}}
                        <span>Блог</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow">Категории</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('admin.blog.categories.index') }}">Все категории</a></li>
                                <li><a href="{{ route('admin.blog.categories.create') }}">Добавить</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0);" class="has-arrow">Посты</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('admin.blog.posts.index') }}">Все посты</a></li>
                                <li><a href="{{ route('admin.blog.posts.create') }}">Добавить</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-list-check"></i>
                        <span>Абитуриенты</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.entrants.index') }}">Все абитуриенты</a></li>
                        <li><a href="{{ route('admin.entrants.create') }}">Добавить абитуриента</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
