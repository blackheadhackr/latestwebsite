@extends('common.adminlayout'){{-- include template --}}
@section('title','Dashboard'){{-- include Dynamic title --}}
@section('pagename','Home'){{-- include Page name--}}
@section('main'){{-- include main content section--}}
<div class="container">
    <div class="row">
        <div class="row my-3">
            <div class="col-md-4 my-2">
                <div class="card bg-c-red total-card">
                    <div class="card-block">
                        <div class="text-left">
                            <h4>121215</h4>
                            <p class="m-0">Category Count</p>
                        </div>
                        <span class="label bg-c-red value-badges"><i class="fa fa-database" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card bg-c-green total-card">
                    <div class="card-block">
                        <div class="text-left">
                            <h4>489</h4>
                            <p class="m-0">Total Comment</p>
                        </div>
                        <span class="label bg-c-green value-badges">15%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card bg-c-red total-card">
                    <div class="card-block">
                        <div class="text-left">
                            <h4>489</h4>
                            <p class="m-0">Total Comment</p>
                        </div>
                        <span class="label bg-c-red value-badges">15%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card bg-c-green total-card">
                    <div class="card-block">
                        <div class="text-left">
                            <h4>489</h4>
                            <p class="m-0">Total Comment</p>
                        </div>
                        <span class="label bg-c-green value-badges">15%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card bg-c-red total-card">
                    <div class="card-block">    
                        <div class="text-left">
                            <h4>489</h4>
                            <p class="m-0">Total Comment</p>
                        </div>
                        <span class="label bg-c-red value-badges">15%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card bg-c-green total-card">
                    <div class="card-block">
                        <div class="text-left">
                            <h4>489</h4>
                            <p class="m-0">Total Comment</p>
                        </div>
                        <span class="label bg-c-green value-badges">15%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection