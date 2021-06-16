@extends('admin.layouts.admin')

@section('title', $glossary->text)

@section('content')
<div class="no-padding pull-right">
    <div class="form-inline">
        <a href="{{ route('admin.translations.create', $glossary->id)}}" class="btn btn-primary ladda-button pull-right" data-style="zoom-in">New</a>
    </div>
</div>
<br>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>Language</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages as $language)
            <tr>
                <td>{{ $language['name'] }}</td>
                <td>
                    <a href="{{ route('admin.translations.edit', ['glossary_id' => $glossary->id, 'language_id' => $language->id]) }}" class="btn btn-xs" data-toggle="tooltip" data-placement="top" data-title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
