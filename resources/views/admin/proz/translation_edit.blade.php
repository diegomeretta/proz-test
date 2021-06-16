@extends('admin.layouts.admin')

@section('title', 'Edit Translation for ' . $glossary->text . ' in ' . $language->name)

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.translations.update', ['glossary_id' => $glossary->id, $language->id]],'method' => 'post','class'=>'form-horizontal form-label-left']) }}

            @php
                $i = 0;
            @endphp
            @foreach ($terms as $term)
                <div class="form-group">
                    <label for="exampleInputEmail{{$i++}}">Text {{$i}}</label>
                    <input id="text{{$i}}" placeholder="{{$term->text}}" class="form-control" type="text" name="text{{$i}}" required>
                </div>
            @endforeach
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> Cancel</a>
                    <button type="submit" class="btn btn-success"> Save</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection
