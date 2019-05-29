<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h2>{{$answersCount ." " .str_plural('answer',$answersCount) }}</h2>
            </div>
            <hr>
            @foreach($answers as $answer)
            <div class="media">
                <div class="d-flex flex-column vote-controls ">
                    <a title="this question is useful" class="vote-up">
                        <i class="fas fa-caret-up fa-3x"></i>
                    </a>
                    <span class="votes-count">1230</span>

                    <a title="this question is not useful" class="vote-down off">
                        <i class="fas fa-caret-down fa-3x"></i>

                    </a>
                    <a title="Click to makr a favorit question (Click again to undo)" class="vote-accepted mt-2 ">
                        <i class="fas fa-check fa-2x  "></i>
                    </a>

                </div>
                <div class="media-body">
                    <p>{!! $answer->body_html !!}</p>
                    <div class="float-right">
                        <span class="text-muted">Answerd {{$answer->created_date}}</span>
                        <div class="media">
                            <a href="{{$answer->user->url}}" class="pr-2">
                                <img src="{{$answer->user->avatar}}" alt="avatar " style="width: 30px">
                            </a>
                            <div class="media-body">
                                <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    </div>
</div>