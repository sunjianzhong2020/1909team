

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
            <li id="admin-index"><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

            <!-- 菜单 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>商家管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="seller_1.html" target="iframe">
                            <i class="fa fa-circle-o"></i>商家审核
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="seller.html" target="iframe">
                            <i class="fa fa-circle-o"></i>商家管理
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
                        <a href="/admin/cateAdd" target="iframe">
                            <i class="fa fa-circle-o"></i>规格管理
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="type_template.html" target="iframe">
                            <i class="fa fa-circle-o"></i>模板管理
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
                        <a href="content_category.html" target="iframe">
                            <i class="fa fa-circle-o"></i>广告类型管理
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="content.html" target="iframe">
                            <i class="fa fa-circle-o"></i>广告管理
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
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- 导航侧栏 /-->