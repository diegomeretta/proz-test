@extends('admin.layouts.admin')

@section('title', 'Create Translation for ' . $glossary->text)

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.translations.store', 'id' => $glossary->id],'method' => 'post','class'=>'form-horizontal form-label-left']) }}

            <label class="">Language</label>
            {!! Form::select('language_id', $languages, null, ['class' => 'form-control']) !!}

            <div class="form-group">
                <label for="exampleInputEmail1">Text 1</label>
                <input id="text1" class="form-control" type="text" name="text1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Text 2</label>
                <input id="text2" class="form-control" type="text" name="text2" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Text 3</label>
                <input id="text3" class="form-control" type="text" name="text3" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Text 4</label>
                <input id="text4" class="form-control" type="text" name="text4">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Text 5</label>
                <input id="text5" class="form-control" type="text" name="text5">
            </div>
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
