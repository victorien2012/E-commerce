@extends('layouts.appadmin')

@section('title')
    Ajouter Produit
@endsection

@section('content')
<div class="main-panel">

    <div class="content-wrapper">

        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter Produit</h4>
                {!! Form::open(['action' =>'ProductController@sauverproduit', 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                  {{ Form::label('', 'Nom de la Produit', ['for'=>'cname']) }}
                  {{ Form::text('product_name', '', ['class'=>'form-control', 'id'=>'cname']) }}
                </div>
                

              <div class="form-group">
                {{ Form::label('', 'Prix du Produit', ['for'=>'cname']) }}
                {{ Form::number('product_prise', '', ['class'=>'form-control', 'id'=>'cname']) }}
              </div>



            <div class="form-group">
                {{ Form::label('', 'Catégorie du produit') }}
                {{--Form::select('product_category', $categories, null,
                ['palceholder' => 'Select category', 'class' => 'form-control'])--}}
              </div>


              <div class="form-group">
                {{ Form::label('', 'Image', ['for'=>'cname']) }}
                {{ Form::file('product_image', ['class'=>'form-control', 'id'=>'cname']) }}
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
<script src="backend/js/form-validation.js"></script>
<script src="backend/js/bt-maxLength.js"></script>
@endsection