@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <!-- <div class="dropdown-menu dropdown-menu-right">
                        
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div> -->
                </div>

                <h4 class="header-title m-t-0 m-b-30">Multiple Statistics</h4>

                <div id="website-stats" style="height: 320px;" class="flot-chart"></div>

            </div>
        </div><!-- end col-->
        </div>
        
    </div>                

               
                
@endsection
