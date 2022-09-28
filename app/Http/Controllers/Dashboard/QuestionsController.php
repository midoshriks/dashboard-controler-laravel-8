<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function Ramsey\Uuid\v1;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderby('id')->paginate(3);

        return view('dashboard.questions.index' , compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->name = $request->name;
        $question->type_question = $request->type_question;

        $question->save();
        Alert::success('Success Save question'.' '.$question->name);
        return redirect()->route('dashboard.questions.index');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        // dd($question);
        return view('dashboard.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question = Question::find($question->id);

        $question->name = $request->name;
        $question->type_question = $request->type_question;

        $question->update();

        Alert::success('Success Update Question'.' '.$question->name);
        return redirect()->route('dashboard.questions.index');
        // dd($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        Alert::toast('deleted successfully question',);
        return redirect()->route('dashboard.questions.index');
    }
}
