@extends('layouts.app')

@section('content')
    <div class="container vot">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1 class="q-title"> {{ $question->title}}</h1>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}} " class="btn btn-outline-secondary">All Question</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls ">
                            <a title="this question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-4x"></i>
                            </a>
                            <span class="votes-count">1230</span>

                            <a title="this question is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-4x"></i>

                            </a>
                            <a title="Click to make a favorite question (Click again to undo)" class="favorite favorited mt-2 ">
                                <i class="fas fa-star fa-2x  "></i>
                                <span class="favorites-count">123</span>
                            </a>

                        </div>
                        <div class="media-body">
                            <div>{{ $question->body}}</div>
                            <div class="float-right">
                                <span class="text-muted"> Answerd {{$question->created_date}}</span>
                                <div class="media mt-2">
                                    <a href="{{$question->user->url}}" class="pr-2">
                                        <img src="{{$question->user->avatar}}" alt="avatar">
                                    </a>
                                    <div class="media-body mt1">
                                        <a href="{{$question->user->url}}"> {{$question->user->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>

            </div>
        </div>
        @include("questions.answers._index",[
                   'answers'=>$question->answers,
                   'answersCount'=>$question->answers_count
                   ])
        @include('questions.answers._create')
        </div>
@endsection
