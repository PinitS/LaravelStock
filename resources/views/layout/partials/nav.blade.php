<!-- 
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm text-white">

  <a class="my-0 mr-md-auto font-weight-normal text-white" href="{{ action('CategoryController@index') }}"><h5>Farm Thailand</h5></a>

  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 dropdown-item" href="/CheckSim">Check</a>
    <a class="p-2 dropdown-item" href="{{ action('ModelcalController@create') }}">Models</a>
    <a class="p-2 dropdown-item" >||</a>
    <a class="p-2 dropdown-item" href="{{ action('CategoryController@create') }}">AddCategory</a>
    <a class="p-2 dropdown-item" href="{{ action('ProductController@create') }}">AddProduct</a>
    <a class="p-2 dropdown-item" href="/search">SearchProduct</a>
    <a class="p-2 dropdown-item" href="/dashboard">DashBorad</a>
    <a class="p-2 dropdown-item" href="/report">Report</a>
    
  </nav>

  

</div> -->



<nav class="navbar navbar-expand-sm navbar-dark bg-dark border-bottom shadow-sm justify-content-center align-items-start">
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- notice position-absolute on the brand which allows it to center-->
    

    <div class="navbar-collapse collapse position-absolute">
      <ul class="navbar-nav justify-content-center">

            <li class="nav-item dropdown mr-2">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Calculator</a>
                <div class="dropdown-menu dropdown-menu-center text-center">
                  <a class="p-2 dropdown-item" href="{{ action('ModelcalController@create') }}">SimulatorModels</a>
                  <div class="dropdown-divider"></div>
                  <a class="p-2 dropdown-item" href="/CheckSim">Requirement</a>
                </div>
            </li>

            <li class="nav-item dropdown mr-2">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">StrockProduct</a>
                <div class="dropdown-menu dropdown-menu-center text-center">
                  <a class="p-2 dropdown-item" href="{{ action('CategoryController@create') }}">AddCategory</a>
                  <div class="dropdown-divider"></div>
                  <a class="p-2 dropdown-item" href="{{ action('ProductController@create') }}">AddProduct</a>
                  <div class="dropdown-divider"></div>
                  <a class="p-2 dropdown-item" href="/search">SearchProduct</a>
                  <div class="dropdown-divider"></div>
                  <a class="p-2 dropdown-item" href="/dashboard">DashBorad</a>
                  <div class="dropdown-divider"></div>
                  <a class="p-2 dropdown-item" href="/report">Report</a>
                </div>
            </li>

            <li class="nav-item dropdown mr-2">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Location</a>
                <div class="dropdown-menu dropdown-menu-center text-center">
                  <a href="#" class="dropdown-item">AddModels</a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">AddBroads</a>
                  <div class="dropdown-divider"></div>
                  <a href="#"class="dropdown-item">ShortUrl</a>
                </div>
            </li>

        </ul>

    </div>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav justify-content-center">
          <a class="navbar-brand position-collapse" href="{{ action('CategoryController@index') }}">Farm Thailand</a>
        </ul>
    </div>
</nav>

