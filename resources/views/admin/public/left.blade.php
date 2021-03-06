

<!-- 导航侧栏 -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> 测试用户</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- /.search form -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu"  >
            <li class="header">菜单</li>
            <li id="admin-index"><a href="{{url('/index/index')}}"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

            <!-- 菜单 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>友情链接管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">

                        <a href="{{url('/admin/friendAdd')}}" target="iframe">

                            <i class="fa fa-circle-o"></i>友情链接添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/friendShow')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>友情链接展示
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>商品管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="{{url('/admin/brandAdd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>品牌添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/brandShow')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>品牌展示
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/goodsAdd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>商品添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/goodsShow')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>商品展示
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/cateAdd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>分类添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/cateShow')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>分类展示
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/SkuNameAdd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>商品属性添加表
                        </a>
                    </li>

                    <li id="admin-login">
                        <a href="{{url('/admin/SkuNameShow')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>商品属性展示表
                        </a>
                    </li>

                    <li id="admin-login">
                        <a href="{{url('/admin/SkuValAdd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>商品属性值添加表
                        </a>
                    </li>

                    <li id="admin-login">
                        <a href="{{url('/admin/SkuValShow')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>商品属性值展示表
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/skuAdd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>SKU添加表
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>广告管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="ment/cateadd" target="iframe">
                            <i class="fa fa-circle-o"></i>广告分类添加管理
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="ment/catelist" target="iframe">
                            <i class="fa fa-circle-o"></i>广告分类展示管理
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="ment/mentlist" target="iframe">
                            <i class="fa fa-circle-o"></i>广告展示管理
                        </a>
                    </li>
                </ul>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>角色管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/role/roleCreate" target="iframe">
                            <i class="fa fa-circle-o"></i>角色添加管理
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/role/roleIndex" target="iframe">
                            <i class="fa fa-circle-o"></i>角色管理
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>权限管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/priv/privCreate" target="iframe">
                            <i class="fa fa-circle-o"></i>权限添加管理
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/priv/privIndex" target="iframe">
                            <i class="fa fa-circle-o"></i>权限管理
                        </a>
                    </li>
                </ul>

            </li>
            <!-- 菜单 /-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>管理员管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/user/userIndex" target="iframe">
                            <i class="fa fa-circle-o"></i>查看管理
                        </a>
                    </li>

                </ul>

            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>导航栏管理</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/admin/banneradd" target="iframe">
                            <i class="fa fa-circle-o"></i>导航栏添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/bannershow" target="iframe">
                            <i class="fa fa-circle-o"></i>导航栏展示
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>活动管理</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="{{url('/admin/activeadd')}}" target="iframe">
                            <i class="fa fa-circle-o"></i>活动添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/activeshow" target="iframe">
                            <i class="fa fa-circle-o"></i>活动展示
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- 导航侧栏 /-->
