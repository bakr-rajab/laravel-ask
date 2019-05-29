<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        \DB::enableQueryLog();
//        $questions =Question::with('user')->latest()->paginate(4);
//        view('questions.index')->with('questions',$questions)->render();
//        dd(\DB::getQueryLog());
        $questions =Question::with('user')->OrderBy('views','desc')->latest()->paginate(4);
        return view('questions.index')->with('questions',$questions);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create')->with('question',$question);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required |max:255',
            'body'=>'required'
        ]);

        $request->user()->questions()->create($request->only('title','body'));
        return redirect()->route('questions.index')->with('success','your question has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update',$question);
        return view('questions.edit')->with('question',$question);

        //        if (\Gate::allows('update-question',$question)){
//
//            return view('questions.edit')->with('question',$question);
//        }
//            return redirect()->route('questions.index')->with('success', 'you are not registered');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
//        if (\Gate::allows('update-question',$question)){
        $this->authorize('update',$question);

            $question->update($request->only('title','body'));
            return redirect()->route('questions.index')->with('success','your question has been Updated');
//        }
//        return redirect()->route('questions.index')->with('success', 'you are not registered');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
//        if (\Gate::allows('delete-question',$question)){
        $this->authorize('delete',$question);

            $question->delete();
            return redirect('/questions')->with('success','your question has been deleted');
//        }
//        return redirect()->route('questions.index')->with('success','you are not registered');

    }
}
