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
                        {!! Form::open(['action' =>'ProductController@modifierproduits', 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}

                        {{ csrf_field() }}

                            {{Form::hidden('id', $produit->id)}}
                        <div class="form-group">

                            {{ Form::label('', 'Nom de la Produit', ['for'=>'cname']) }}
                            {{ Form::text('product_name', $produit->nom, ['class'=>'form-control', 'id'=>'cname']) }}
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            {{ Form::label('', 'Prix du Produit', ['for'=>'cname']) }}
                            {{ Form::text('product_price', $produit->prix, ['class'=>'form-control', 'id'=>'cname']) }}
                            @error('product_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


{{--                            @php dd($categories) @endphp--}}
                        <div class="form-group">
{{--                            {{ Form::label('', 'Catégorie du produit') }}--}}
{{--                            {{ Form::select('product_category', $produit->categorie,['class'=>'form-control']) }}--}}
                            <select name="product_category" id="" class="form-control">
{{--                                <option></option>--}}
                                <option selected value="{{$produit->categorie_id}}">{{$produit->categorie->nom_categorie}}</option>
                                @foreach($categories as $categorie)

                                    <option value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>

                                @endforeach

                                @error('product_category')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </select>

                        </div>


                        <div class="form-group">

                            {{ Form::label('', 'image', ['for'=>'cname']) }}
                            <td>
                                <img src="{{ asset('storage/'.$produit->image[0]->nom) }}" alt="" style="max-width: 50px; height: auto;">
                            </td>

                            {{ Form::file('product_image', $produit->produit_image, ['class'=>'form-control', 'id'=>'cname']) }}
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

