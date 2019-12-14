@extends('layouts.app')

@section('content')
    <div class="form-example-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Add Target</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <form action="{{ url('addTarget') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="file" name="image" class="form-control input-sm" placeholder="Enter Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                    <div class="form-example-int">
                                        <button class="btn btn-success notika-btn-success waves-effect">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
