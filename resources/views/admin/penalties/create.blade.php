@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="fa fa-bookmark"></i> Record Penalty</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Tenant Information</header>
                        </div>
                        <form action="{{ route('admin.penalties.store') }}" method="post">
                            @csrf
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div class="form-group">
                                        <label>Tenant: <span class="text-danger">*</span></label>
                                        <select class="mdl-textfield__input" name="tenant_id" id="tenant_id" required>
                                            <option selected disabled>--Select Tenant--</option>
                                            @foreach ($tenants as $tenant)
                                                <option value="{{ $tenant->id }}">
                                                    {{ $tenant->name ?? '' }}({{ $tenant->house->name }}) -
                                                    {{ $tenant->apartment->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="number" id="amount" name="amount"
                                            value="{{ old('amount') }}" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-dollar"></i> Amount:</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center pull-right" style='margin-top:100px;'>
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary">Record
                                        Penalty
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card box">
                        <div class="card-head">
                            <header>Penalties Record </header>
                        </div>
                        <div class="card-body print_section" id="bar-parent">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table table-hover">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th class="text-center">#</th>
                                            <th class="text-right">Date</th>
                                            <th class="text-right">Tenant</th>
                                            <th class="text-right">Amount</th>
                                            <th class="text-right">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($penalties) > 0)
                                            @foreach ($penalties as $penalty)
                                                <tr class="text-capitalize">
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $penalty->created_at->toDayDateTimeString() ?? '' }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $penalty->tenant->name ?? '' }}</td>
                                                    <td class="text-right">Ksh.
                                                        {{ number_format($penalty->amount, 0) }}</td>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="badge badge-info">
                                                            {{ $penalty->status == 0 ? 'Pending' : 'Paid' }}
                                                        </span>
                                                    </td>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <h4>No payment records</h4>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
