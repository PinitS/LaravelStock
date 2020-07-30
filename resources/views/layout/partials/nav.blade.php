
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm text-white">

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

</div>