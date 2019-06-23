@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('posts.Posts')}} #{{ $post->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('admin/posts/' . $post->id . '/edit') }}" class="btn btn-default btn-sm" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/posts', $post->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('posts.Delete'). ' Post',
                    'onclick'=>'return confirm("'.trans('posts.Confirm delete?').'")'
            )) !!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $post->id }}</td>
            </tr>
            <tr><th> {{ trans('posts.title') }} </th><td> {{ $post->title }} </td></tr><tr><th> {{ trans('posts.body') }} </th><td> {{ $post->body }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/admin/posts') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("posts.Back")}}</a>
    </div>
  </div>
</section>

@endsection
