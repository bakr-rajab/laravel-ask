@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Edit Question</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}} " class="btn btn-outline-secondary">Back to All Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['action' => ['QuestionsController@update',$question->id],'method'=>'POST']) !!}

                        <div class="form-group ">
                            {{ Form::label('title', 'Title')}}
                            {{Form::text('title',$question->title,['class' => 'form-control '.($errors->has('title') ? 'is-invalid':''),'placeholder'=>'Question Title'])}}

                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('title')}}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group ">
                            {{ Form::label('body', 'Body')}}
                            {{Form::textarea('body',$question->body,['class' => 'form-control '.($errors->has('body') ? 'is-invalid':''),'placeholder'=>'Explain your question','rows'=>10])}}

                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                        </div>

                        {!! Form::close() !!}


                        {{--<div class="pagination justify-content-center">--}}
                        {{--{{$questions->links()}}--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
