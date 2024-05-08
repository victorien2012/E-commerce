@extends('layouts.appadmin')

@section('title')
    Ajouter Catégotrie
@endsection

@section('content')
<div class="main-panel">

    <div class="content-wrapper">

{{--        <div class="col-lg-12">--}}
        <div class="container col-lg-6">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter Catégorie</h4>
    @if (Session::has('status'))
         <div class="alert alert-success">
            {{Session::get('status')}}
        </div>
    @endif

     @if (count($errors)>0);

      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
      </ul>
      </div>
    @endif

                {!! Form::open(['action' =>'CategoryController@sauvercategorie', 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                  {{ Form::label('', 'Nom de la Catégorie', ['for'=>'cname']) }}
                  {{ Form::text('category_name', '', ['class'=>'form-control', 'id'=>'cname']) }}
                </div>
                {!! Form::submit('Ajouter', ['class'=>'btn btn-primary']) !!} <!-- Correction ici -->
              {!! Form::close() !!}

              </div>
            </div>
          </div>
    </div>

 </div>
@endsection


@section('scripts')
{{-- <script src="backend/js/form-validation.js"></script>
<script src="backend/js/bt-maxLength.js"></script> --}}
@endsection
