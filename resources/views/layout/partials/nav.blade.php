
<!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm text-white">

  <a class="my-0 mr-md-auto font-weight-normal text-white" href="{{ action('CategoryController@index') }}"><h5>Farm Thailand</h5></a>

  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-white" href="/CheckSim">Check</a>
    <a class="p-2 text-white" href="{{ action('ModelcalController@create') }}">Models</a>
    <a class="p-2 text-white" >||</a>
    <a class="p-2 text-white" href="{{ action('CategoryController@create') }}">AddCategory</a>
    <a class="p-2 text-white" href="{{ action('ProductController@create') }}">AddProduct</a>
    <a class="p-2 text-white" href="/search">SearchProduct</a>
    <a class="p-2 text-white" href="/dashboard">DashBorad</a>
    <a class="p-2 text-white" href="/report">Report</a>
  </nav>

</div> -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand position-collapse" href="{{ action('CategoryController@index') }}">Farm Thailand</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse show" id="navbarsExample04" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Calculator</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{ action('ModelcalController@create') }}">SimulatorModels</a>
          <a class="dropdown-item" href="/CheckSim">Requirement</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">StrockProduct</a>
        <div class="dropdown-menu" aria-labelledby="dropdown02">
          <a class="dropdown-item" href="{{ action('CategoryController@create') }}">AddCategory</a>
          <a class="dropdown-item" href="{{ action('ProductController@create') }}">AddProduct</a>
          <a class="dropdown-item" href="/search">SearchProduct</a>
          <a class="dropdown-item" href="/dashboard">DashBorad</a>
          <a class="dropdown-item" href="/report">Report</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">StrockProduct</a>
        <div class="dropdown-menu" aria-labelledby="dropdown02">
          <a class="dropdown-item" href="{{ action('ModellocatController@create') }}">Models</a>
          <a class="dropdown-item" href="{{ action('BroadlocatController@create') }}">AddBroads</a>
          <a href="https://www.shorturl.at/" target="_blank" class="dropdown-item">ShortUrl</a>
        </div>
      </li>

    </ul>
  </div>
</nav>