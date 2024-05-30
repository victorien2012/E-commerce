@extends('layouts.appadmin')

@section('title')
    Modifier Slider
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container col-lg-6">
                <div class="card">
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="card-title">Modifier Slider</h4>
                        {!! Form::open(['action' => ['SliderController@modifiersliders', $sliders->id], 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}

                        {{ csrf_field() }}

                        {{ Form::hidden('id', $sliders->id) }}

                        <div class="form-group">
                            {{ Form::label('description1', 'Description 1', ['for'=>'cname']) }}
                            {{ Form::text('description1', $sliders->description1, ['class'=>'form-control', 'id'=>'cname']) }}
                            @error('description1')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            {{ Form::label('description2', 'Description 2', ['for'=>'cname']) }}
                            {{ Form::text('description2', $sliders->description2, ['class'=>'form-control', 'id'=>'cname']) }}
                            @error('description2')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="form-group">
                                {{ Form::label('', 'Slider Image', ['for'=>'cname']) }}
                                <div>
                                    @if ($sliders->slider_image)
                                        <img src="{{ asset('storage/'.$sliders->slider_image) }}" alt="" style="max-width: 150px; height: auto;">
                                    @else
                                        <p>Aucune image sélectionnée</p>
                                    @endif
                                </div>
                                {{ Form::file('slider_image', ['class'=>'form-control', 'id'=>'cname']) }}
                                @error('slider_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                    </div>

                        {!! Form::submit('Modifier', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="backend/js/form-validation.js"></script> --}}
    {{-- <script src="backend/js/bt-maxLength.js"></script> --}}
@endsection
