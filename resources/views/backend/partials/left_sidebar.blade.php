<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{asset('public/assets/images/faces/face8.jpg')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Allen Moreno</p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
           
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#product-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="product-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.products')}}">Manage Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product.create')}}"> Add Product </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#order-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Order</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="order-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.orders')}}">Manage Orders</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#category-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="category-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categories')}}">Manage Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.create')}}">Add Category</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#brand-basic" aria-expanded="false" aria-controls="brand-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Brand</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="brand-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brands')}}">Manage Brand</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brands.create')}}">Add Brand</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#division-basic" aria-expanded="false" aria-controls="division-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Division</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="division-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.divisions')}}">Manage Division</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.division.create')}}">Add Division</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#district-basic" aria-expanded="false" aria-controls="district-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage District</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="district-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.districts')}}">Manage District</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.district.create')}}">Add District</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#slider-basic" aria-expanded="false" aria-controls="slider-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Slider</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="slider-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sliders')}}">Manage Slider</a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Form elements</span>
              </a>
            </li> -->


          </ul>
        </nav>