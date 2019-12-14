@extends('layouts.app')

@section('content')
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Targets Table </h2>
                                        <p>See targets</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>All Targets</h2>
                        </div>
                        <div class="bsc-tbl">
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                            @if(count($targets) > 0)
                                    <table class="table table-sc-ex">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>width</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($targets as $index=>$row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                @php
                                                    $public_path = '/opt/lampp/htdocs/vuforia/public/images/';
                                                        $image = explode('_',$row->name);

                                                    $file = $public_path.$image[0].'.jpg';

                                                    $condition = \Illuminate\Support\Facades\File::exists($file);

                                                    $extension = '.jpg';
                                                    if ($condition !== true){
                                                        $file = $public_path.$image[0].'.jpeg';
                                                        $condition = file_exists($file);
                                                        $extension = '.jpeg';
                                                        if ($condition !== true){
                                                            $file = $public_path.$image[0].'.png';
                                                            $extension = '.png';
                                                        }
                                                    }
                                                @endphp
                                                <td><img src="{{ url('images/'.$image[0].$extension) }}" style="width: 68px;height: 72px;border-radius: 29px;"></td>
                                                <td>{{ $row->width }}</td>
                                                <td>{{ $row->tracking_rating }}</td>
                                                <td>
                                                    <a onclick="return confirm ('Are You Sure Delete This Target ?')" href="{{ route('delete_form',$row->target_id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            @else
                                <h1>there is no data <a href="{{ route('add_form') }}" class="btn btn-success">Create New Target</a></h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
