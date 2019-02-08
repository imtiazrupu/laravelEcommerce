<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
            <a href="#"><i class="fa fa-home text-red"></i> <span>Template</span>
              <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
            </a>
            <ul class="treeview-menu">

              <li class="active">
                <a href="{{ url('dashboard/slide') }}">
                  <i class="fa fa-arrow-circle-o-right text-yellow"></i><span>Slider</span>
                </a>
              </li>
              <li class="treeview">
                    <a href=""><i class="fa fa-dropbox text-orange"></i> <span>Collections</span>
                      <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                    </a>
                    <ul class="treeview-menu">
                            <li >
                                    <a href="{{ url('/dashboard/background-photo') }}">
                                      <i class="fa fa-inbox"></i>
                                      <span>Background Photo</span></a>
                                  </li>
                                 <li >
                                    <a href="{{ url('/dashboard/mordern-collection') }}">
                                      <i class="fa fa-gears"></i>
                                      <span>Mordern Collections</span></a>
                                  </li>
                         <li >
                            <a href="{{ url('/dashboard/classic-collection') }}">
                              <i class="fa fa-th"></i><span>Classic collections</span>
                            </a>
                          </li>

                    </ul>
                  </li>
            </ul>
          </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-users text-aqua"></i> <span>Setup</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">

            <li class="active">
              <a href="{{ url('/dashboard/categories') }}">
                <i class="fa fa-circle text-success"></i><span>Categories</span>
              </a>
            </li>

            <li class="active">
              <a href="{{ url('/dashboard/sub-categories') }}">
                <i class="fa fa-circle text-danger"></i>
                <span>Sub-Categories</span></a>
            </li>

            <li class="active">
              <a href="{{ url('/dashboard/product-categories') }}">
                <i class="fa fa-circle text-info"></i><span>Product Categories</span>
              </a>
            </li>

          </ul>
        </li>
        <li class="treeview">
                <a href="#"><i class="fa fa-shopping-cart text-green"></i> <span>Product</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">

                  <li class="active">
                    <a href="{{ url('/dashboard/create-product')  }}">
                      <i class="fa fa-shopping-cart text-red"></i><span>Create Product</span>
                    </a>
                  </li>

                  <li class="active">
                    <a href="{{ url('/dashboard/products') }}">
                      <i class="fa fa-shopping-cart text-blue"></i>
                      <span>All Products</span></a>
                  </li>



                </ul>
              </li>


        <li>
          <a href="{{ url('dashboard/orders') }}">
            <i class="fa fa-500px"></i><span>Orders</span>
          </a>
        </li>

        <li class="treeview">
                <a href=""><i class="fa fa-envelope-o"></i> <span>Blogs</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('/dashboard/our-store') }}">Our Store</a></li>
                  <li><a href="{{ url('/dashboard/blog-post') }}">Blog Post</a></li>

                </ul>
              </li>
        <li class="treeview">
                <a href=""><i class="fa fa-clock-o"></i> <span>Inventory</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('dashboard/add-stock')}}">Stock In</a></li>
                  <li><a href="{{url('dashboard/out-stock')}}">Stock Out</a></li>
                  <li><a href="{{url('dashboard/report')}}">Stock Report</a></li>

                </ul>
              </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
