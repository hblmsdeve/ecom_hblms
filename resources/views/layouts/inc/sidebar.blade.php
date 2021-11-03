<div class="sidebar" data-color="purple" data-background-color="white" data-image="">
  <div class="logo">
    <h6 class="simple-text logo-normal">deve-shop</h6>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/products') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/products') }}">
          <i class="material-icons">inventory</i>
          <p>Products</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/add-product') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/add-product') }}">
          <i class="material-icons">add_circle</i>
          <p>Add Product</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/categories') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/categories') }}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/add-category') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/add-category') }}">
          <i class="material-icons">add_circle</i>
          <p>Add Category</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/orders') }}">
          <i class="material-icons">shopping_cart</i>
          <p>Orders</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/customers') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/customers') }}">
          <i class="material-icons">people</i>
          <p>Customers</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
          <i class="material-icons">image</i>
          <p>Sliders</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/add-slider') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('admin/add-slider') }}">
          <i class="material-icons">add_a_photo</i>
          <p>Add Slider</p>
        </a>
      </li>
    </ul>
  </div>
</div>