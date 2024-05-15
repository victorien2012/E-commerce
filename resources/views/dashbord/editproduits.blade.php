@extends('layouts.appadmin')

@section('title')
    modifier Produit
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

                        <h4 class="card-title">Modifier  Produit</h4>
                        {!! Form::open(['action' =>'ProductController@sauverproduit', 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}

                        {{ csrf_field() }}

                        <div class="form-group">
                            {{Form::hidden('id', $produit->id)}}
                            {{ Form::label('', 'Nom de la Produit', ['for'=>'cname']) }}
                            {{ Form::text('product_name, $produit->nom', ['class'=>'form-control', 'id'=>'cname']) }}
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            {{Form::hidden('id', $produit->id)}}
                            {{ Form::label('', 'Prix du Produit', ['for'=>'cname']) }}
                            {{ Form::text('product_price, $produit->prix', ['class'=>'form-control', 'id'=>'cname']) }}
                            @error('product_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                            {{Form::hidden('id', $produit->id)}}
                        <div class="form-group">  {{ Form::label('', 'Catégorie du produit') }}

                            <select name="product_category, $produit->categorie_id" id="" class="form-control">
                                <option></option>
                                @foreach($categories as $categories)

                                    <option value="{{$categories->id}}">{{$categories->nom_categorie}}</option>

                                @endforeach

                                @error('product_category')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>


                        <div class="form-group">
                            {{--                            <input type="file" name="product_image" id="">--}}
                            {{Form::hidden('id', $produit->id)}}
                            {{ Form::label('', 'image', ['for'=>'cname']) }}
                            {{ Form::file('product_image, $image->produit_id', ['class'=>'form-control', 'id'=>'cname']) }}
                        </div>
                        {!! Form::submit('Ajouter', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    {{--<script src="backend/js/form-validation.js"></script>--}}
    {{--<script src="backend/js/bt-maxLength.js"></script>--}}
@endsection

