@extends('layouts.app')

@section('template_linked_css')

    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
    <style>
.loader {
  border: 1px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Domain management
                            </span>   
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{url('domain-management/post_setting')}}" role="form" class="needs-validation" enctype='multipart/form-data'>
                        <input type="hidden" name="client_id" value="{{$client_id}}">
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback row ">
                                <input type="radio" name="has_domain" value="1" class="domain" @if(isset($gte_domain_setting)) @if($gte_domain_setting->has_domain == 1) checked="checked" @endif @else checked="checked" @endif>
                                <label for="email" class="col-md-3 control-label">Client has domain and website</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                    <input class="form-control client_domain" name="client_domain" type="text" @if(isset($gte_domain_setting)) @if($gte_domain_setting->has_domain == 1) value="{{isset($gte_domain_setting)?$gte_domain_setting->domain_name:''}}" @endif @endif>
                                        <div class="input-group-append">
                                            <label for="email" class="input-group-text">
                                                <i class="fa fa-fw fa-envelope" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                                                    </div>
                            </div>

                            <div class="form-group has-feedback row ">
                                <input type="radio" name="has_domain" value="2" class="domain" @if(isset($gte_domain_setting)) @if($gte_domain_setting->has_domain == 2) checked="checked" @endif @endif>
                                <label for="email" class="col-md-3 control-label">Client want api to work in sub-domain and website</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                    <input class="form-control client_wants_domain" name="client_wants_domain" type="text" @if(isset($gte_domain_setting)) @if($gte_domain_setting->has_domain == 2)  value="{{isset($gte_domain_setting)?$gte_domain_setting->domain_name:''}}" @endif @endif>
                                    </div>
                                </div>
                                @
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" readonly value="perklocker.com">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-feedback row">
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input class="btn" type="submit" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection