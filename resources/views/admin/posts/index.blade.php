@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('posts.Posts')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/admin/posts/create') }}" class="btn btn-success btn-sm" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($posts))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/admin/posts?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/admin/posts?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('posts.title') }}
              <div class="btn-group pull-right">
                <a href="{{url('/admin/posts?order_by=title&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='title' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/admin/posts?order_by=title&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='title' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('posts.body') }}
              <div class="btn-group pull-right">
                <a href="{{url('/admin/posts?order_by=body&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='body' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/admin/posts?order_by=body&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='body' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('posts.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($posts as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'title') class="active" @endif>{{ $item->title }}</td><td @if($order_by == 'body') class="active" @endif>{{ $item->body }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/admin/posts/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('posts.View')}} Post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('posts.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('posts.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/posts', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('posts.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('posts.Delete')}} Post"></span> {{trans('posts.Delete')}}</a>
                      </li>
                    </ul>
                  </div>

                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    @else
      <div class="box-body">
        <div class="callout bg-gray">
          <h4>{{trans('posts.Empty')}}</h4>
          <p>{{trans('posts.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $posts->render() !!}
    </div>
  </div>
</section>
@endsection
