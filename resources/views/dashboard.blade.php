@extends('layouts.master')

@section('title','Dashboard')

@section('content')

<p class="text-danger">{{session('mssg')}}</p>

<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-one">
        <div class="widget-heading">
            <h5 class="">Revenue</h5>
            <ul class="tabs tab-pills">
                <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Daily</a></li>
            </ul>
        </div>

        <div class="widget-content">
            <div class="tabs tab-content">
                <div id="content_1" class="tabcontent">
                    <div id="daily-transaction-graph"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-heading">
            <h5 class="">Sales by Category</h5>
        </div>
        <div class="widget-content">
            <div id="topsellingPartType" class=""></div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget-two">
        <div class="widget-content" style="min-height: 300px; ">
            <div class="w-numeric-value">
                <div class="w-content">
                    <span class="w-value"><span class="text-success">Supply</span> and <span class="text-danger">Demand</span>
                    <span class="w-numeric-title">Go to columns for details.</span>
                </div>
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
            </div>
            <div class="w-chart">
                <div id="daily-sales-transaction-graph"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">

        <div class="widget-content" style="min-height: 200px; ">

            <div class="widget widget-activity-four" >

                <div class="widget-heading">
                    <h5 class="">Recent Activities</h5>
                </div>

                <div class="widget-content" style="min-height: 200px; max-height: 220px;">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">

                            @foreach($activity_logs as $logs)
                            <div class="item-timeline timeline-primary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>{{ucwords($logs->action)}}</p>

                                    <span class="badge badge-success">BUY</span>
                                    <p class="t-time">{{$logs->duration}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="tm-action-btn">
                            <a href="{{ route('showUsersActivity')}}">View All
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>


                </div>
            </div>



        </div>

</div>



@endsection
