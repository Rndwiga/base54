@extends('layouts.portal')
@section('title', 'Main page')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="pull-right">
                            <button class="btn btn-white btn-xs" type="button">Model</button>
                            <button class="btn btn-white btn-xs" type="button">Publishing</button>
                            <button class="btn btn-white btn-xs" type="button">Modern</button>
                        </div>
                        <div class="text-center article-title">
                            <span class="text-muted"><i class="fa fa-clock-o"></i> 3th Feb 2017</span>
                            <h1>
                                History of Motorcycles
                            </h1>
                        </div>
                        <p>
                            Motorcycles are descended from the "safety" bicycle, bicycles with front and rear wheels of the same size, with a pedal crank mechanism to drive the rear wheel.
                        </p>
                        <p>
                            The first motorbike was built in 1868. It was not powered by a gasoline engine, but by a steam engine. Its builder was Sylvester Howard Roper. His steam-powered bike was demonstrated at fairs and circuses in the eastern US in 1867 and did not catch on, but it anticipated many modern motorbike features, including the twisting-handgrip throttle control. There is an existing example of a Roper machine, dated 1869. It's powered by a charcoal-fired two-cylinder engine, whose connecting rods directly drive a crank on the rear wheel. This machine predates the invention of the safety bicycle by many years, so its chassis is also based on the "bone-crusher" bike. "Bone-Crusher's" appeared around 1800, used iron-banded wagon wheels, and were called "bone-crushers," both for their jarring ride, and their tendency to toss their riders.
                        </p>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Tags:</h5>
                                <button class="btn btn-primary btn-xs" type="button">Model</button>
                                <button class="btn btn-white btn-xs" type="button">Publishing</button>
                            </div>
                            <div class="col-md-6">
                                <div class="small text-right">
                                    <h5>Stats:</h5>
                                    <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                                    <i class="fa fa-eye"> </i> 144 views
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
