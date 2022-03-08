@extends('layouts.admin')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="fa fa-bookmark"></i> Record Payment</div>
                    </div>
                    <form class="search-form-opened pull-right" action="#" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <ol class="breadcrumb page-breadcrumb pull-right d-none">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="./">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="all_records.php">Accounting</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Record Payment</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6  offset-md-3">
                    <div class="card">
                        <div class="card-head">
                            <header>
                                <div>
                                    <form action="{{ route('admin.tenants.search') }}" method="post">
                                        @csrf
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label search-box">
                                            <input class="mdl-textfield__input" type="text" id="amount" name="term"
                                                value="{{ $query ?? '' }}">
                                            <label class="mdl-textfield__label"><i class="fa fa-search"></i> Search..
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </header>
                        </div>
                        @if (count($tenants) > 0)
                            @foreach ($tenants as $tenant)
                                <div class="card-body result">
                                    <p>
                                        <span class="patient-img">
                                            <img src="{{ asset('img/avatar.png') }}">
                                        </span>
                                        <a href="{{ route('admin.tenants.record.payment', $tenant->id) }}">
                                            {{ $tenant->name }} ...
                                            {{ $tenant->apartment->name }}, {{ $tenant->house->name }} </a>
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body result">
                                <div class="text-danger">
                                    No search results.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
