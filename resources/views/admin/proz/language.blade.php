@extends('admin.layouts.admin')

@section('title', 'Language')

@section('content')
<div class="no-padding pull-right">
    <div class="form-inline">
        <a href="{{ route('admin.languages.create')}}" class="btn btn-primary ladda-button pull-right" data-style="zoom-in">New</a>
    </div>
</div>
<br>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages as $language)
            <tr>
                <td>{{ $language->name }}</td>
                <td>{{ $language->created_at }}</td>
                <td>
                    <a href="{{ route('admin.languages.destroy', [$language->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="destroy" disabled>
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{ $users->links() }}
    </div>
</div>
@endsection
