@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 space-y-6">
            <!-- Metric Group One -->
            @include('admin.partials.metric-group.metric-group-01')
            <!-- Metric Group One -->

            <!-- ====== Table One Start -->
            @include('admin.partials.table.table-01')
            <!-- ====== Table One End -->
        </div>
    </div>
@endsection
