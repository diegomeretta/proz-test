@extends('admin.layouts.admin')

@section('title', 'Glossary')

@section('content')
<div class="no-padding pull-right">
    <div class="form-inline">
        <a href="{{ route('admin.glossary.create')}}" class="btn btn-primary ladda-button pull-right" data-style="zoom-in">New Glossary</a>
    </div>
</div>
<br>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>Text</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($glossary as $glossari)
            <tr>
                <td>{{ $glossari->text }}</td>
                <td>{{ $glossari->created_at }}</td>
                <td>
                    <a href="{{ route('admin.glossary.translations', [$glossari->id]) }}" class="btn btn-xs" data-toggle="tooltip" data-placement="top" data-title="See Translations">
                        <button>See Translations</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
