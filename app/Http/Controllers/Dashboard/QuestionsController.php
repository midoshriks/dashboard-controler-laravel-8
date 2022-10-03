<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Type;
use App\Models\Level;
use App\Models\Answer;
use App\Models\Question;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderby('id')->paginate(20);
        $types = Type::where('model', 'question')->get();
        $levels = level::all();
        return view('dashboard.questions.index', compact('questions', 'types', 'levels'));
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
        // dd($request->all());
        $question = new Question();
        $question->name = $request->name;
        $question->type_id = $request->type_id;
        $question->level_id = $request->level_id;
        $question->save();
        // dd($question->id);
        for ($i = 1; $i <= 4; $i++) {
            Answer::create([
                'answer' => $request["answer_$i"],
                'question_id' => $question->id,
                'correct' => ($request['correct'] == $i) ? 1 : 0,
            ]);
        }

        Alert::success('Success Save question' . ' ' . $question->name);
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
        // $question->name = $request->name;
        // $question->type_question = $request->type_question;
        // $question->update();
        $question->name = $request->name;
        $question->type_id = $request->type_id;
        $question->level_id = $request->level_id;
        $question->save();
        // dd($question->id);
        for ($i = 1; $i <= 4; $i++) {
            Answer::create([
                'answer' => $request["answer_$i"],
                'question_id' => $question->id,
                'correct' => ($request['correct'] == $i) ? 1 : 0,
            ]);
        }

        Alert::success('Success Update Question' . ' ' . $question->name);
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
    public function import(Request $request)
    {
        $data = $request->file('file');

        // dd($data);

        $namefile = $data->getClientOriginalName();
        $data->move('excel', $namefile);

        Excel::import(new QuestionsImport, \public_path('/excel/' . $namefile));
        // dd($data);
        Alert::toast('successfully Import file',);
        return redirect()->back();
    }
}
