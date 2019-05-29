@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">
                                {{--@if(Auth::user()->can('ask-question',$question))--}}
                                     <a href="{{route('questions.create')}} " class="btn btn-outline-secondary">Ask Question</a>
                                {{--@endif--}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">

                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong>
                                        {{str_plural('vote',$question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{$question->answers_count}}</strong>
                                        {{str_plural('answers',$question->answers_count)}}
                                    </div>
                                    <div class="view">
                                        {{$question->views ." " .str_plural('views',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h3 class="mt-0"><a href="{{$question->url}}">{{ $question->title }}</a></h3>
                                    <div class="float-right">
                                        @can('update',$question)
                                            <a href="{{route('questions.edit',$question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can('delete',$question)
                                                {!! Form::open(['action' => ['QuestionsController@destroy',$question->id],'method'=>'POST','class'=>'d-inline']) !!}
                                            <div class="form-group d-inline">
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Delete',['class'=>'btn btn-sm btn-outline-danger','onclick'=>"return confirm('Are you sure!')"])}}
                                            </div>
                                            {!! Form::close() !!}
                                        @endcan
                                    </div>
                                    <p class="lead">
                                        Asked by
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                    </p>

                                    <p>{{str_limit($question->body,250)}}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                       <div class="pagination justify-content-center">
                           {{$questions->links()}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
