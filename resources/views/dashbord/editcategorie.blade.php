@extends('layouts.appadmin')

@section('title')
    Modifier Catégotrie
@endsection

@section('content')
    <div class="main-panel">

        <div class="content-wrapper">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifer Catégorie</h4>
                        @if (Session::has('status'))
                            <div class="alert alert-success">
                                {{Session::get('status')}}
                            </div>
                        @endif


                        {!! Form::open(['action' =>'CategoryController@modifiercategorie', 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{Form::hidden('id', $categorie->id)}}
                            {{ Form::label('', 'Nom de la Catégorie', ['for'=>'cname']) }}
                            {{ Form::text('category_name', $categorie->nom_categorie, ['class'=>'form-control', 'id'=>'cname']) }}
                        </div>
                        {!! Form::submit('Modifier', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

