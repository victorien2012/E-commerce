@extends('layouts.appadmin')

@section('title')
    Ajouter Catégotrie
@endsection

@section('content')
<div class="main-panel">

    <div class="content-wrapper">

        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter Catégories</h4>
                <form class="cmxform" id="commentForm" method="get" action="#">
                  {!!Form::open(['action' =>'CategoryController@sauvercategorie', 'method'=> 'POST', 'class' => 'cmxform', 'id'=>'commentForm'])!!}
                  {{ csrf_field() }}
                    <div class="form-group">
                      {{Form::label('', 'Nom de la Catégorie', ['For'=>'cname'])}}
                      {{Form::text('category_name', '', ['class'=>'form-control', 'id'=>'cname'])}}
                    </div>
                    {!!Form::submit('Ajouter', 'class'=>'btn btn-primary')!!}
                    {!!Form::close()!!}
                </form>
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