@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title">{{__('Inside Dhaka Shipping Cost')}}</h3>
            </div>
            <form action="{{ route('shipping_configuration.update') }}" method="POST" enctype="multipart/form-data">
            {{-- <div class="panel-body">
                @csrf
                <input type="hidden" name="type" value="shipping_cost_admin">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" type="text" name="shipping_cost_admin" value="{{ \App\BusinessSetting::where('type', 'shipping_cost_admin')->first()->value }}">
                    </div>
                </div>
            </div> --}}

            <div class="panel-body">
                @csrf
                <input type="hidden" name="type" value="inside_dhaka">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" type="text" name="inside_dhaka" value="{{ \App\BusinessSetting::where('type', 'inside_dhaka')->first()->value }}">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit">{{__('Update')}}</button>
            </div>
            </form>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title">{{__('Outsite Dhaka Shipping Cost')}}</h3>
            </div>
            <form action="{{ route('shipping_configuration.update') }}" method="POST" enctype="multipart/form-data">
            <div class="panel-body">
                @csrf
                <input type="hidden" name="type" value="outside_dhaka">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" type="text" name="outside_dhaka" value="{{ \App\BusinessSetting::where('type', 'outside_dhaka')->first()->value }}">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit">{{__('Update')}}</button>
            </div>
            </form>
        </div>
    </div>

</div>

@endsection
