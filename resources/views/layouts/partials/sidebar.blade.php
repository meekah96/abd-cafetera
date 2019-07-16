<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Dashboard</span></a></li> 
           @if($user->inRole('admin')) <li><a href="/admin/order/view"><i class='fa fa-user'></i> <span>Administrator</span></a></li> @endif
           @if($user->inRole('admin') || $user->inRole('customer') ) <li><a href="/customer/product/view"><i class='fa fa-line-chart'></i> <span>My Purcahse Record</span></a></li>  @endif
           @if($user->inRole('admin') || $user->inRole('chef') ) <li><a href="/chef/product/view"><i class='fa fa-coffee'></i> <span>Chef Managment</span></a></li> @endif
           @if($user->inRole('admin')) <li><a href="/admin/product/get-product"><i class='fa fa-pencil-square-o'></i> <span>Products</span></a></li> @endif
           @if($user->inRole('admin') || $user->inRole('receiptent')) <li><a href="/receiptent/product/view"><i class='fa fa-users'></i> <span>Receiptent</span></a></li> @endif
           @if($user->inRole('admin') || $user->inRole('deliver-boy'))  <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Delivery Managment</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/deliver-boy/product/view">All Delivery</a></li>
                    <li><a href="/deliver-boy/my-product/view">My Delivery</a></li>
                </ul>
            </li> @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
