<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h2>Your answer</h2>
            </div>
            <hr>
            <div class="card-body">
                {!! Form::open(['action' => ['AnswersController@store',$question->id],'method'=>'POST']) !!}

                <div class="form-group ">
                    {{Form::textarea('body',old('body'),['class' => 'form-control '.($errors->has('body') ? 'is-invalid':''),'placeholder'=>'Explain your Answer','rows'=>10])}}

                    @if($errors->has('body'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('body')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    {{--{{Form::hidden('_method','PUT')}}--}}
                    {{Form::submit('Post your answer',['class'=>'btn btn-primary'])}}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
</div>