

@extends('layout.mainlayout')

@section('page_title' , 'Models')

@section('content')


<form action="/Modellocat" method ="post">

    {{ csrf_field() }}

        @if(Session::has('message'))
            <div class="alert alert-success"> <h3 class="alert-heading"> {{Session::get('message')}} </h3> </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger"> <h3 class="alert-heading"> {{Session::get('error')}} </h3> </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning"> <h3 class="alert-heading"> {{Session::get('warning')}} </h3> </div>
            
        @endif

        <table class = "table">

            <thead class = "thead-dark">
                <tr>
                    <th scope = "col">Province</th>
                    <th scope = "col">BroadsSUM</th>
                </tr>
            </thead>

            <tbody>

            @foreach($Broadlocat as $Broad)
                <tr>
                
                    <td> <a href="{{ route('Broadlocat.customshow', ['Pid' => $Broad->province_id ,'Mid'=> $Broad->modellocat_id]) }}">{{$Broad->province->name_th}} </a> </td>
                    <td> {{$Broad->Cntprovine}} </td>

                </tr>
            @endforeach


            </tbody>
        
        </table>
        

</form>

@endsection