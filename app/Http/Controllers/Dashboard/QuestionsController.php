<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\QuestionsDemoExport;
use App\Exports\QuestionsExport;
use App\Models\type;
use App\Models\level;
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
        $title = "Questions";
        $questions = Question::orderby('id', 'desc')->get();
        $types = type::where('model', 'question')->get();
        $levels = level::all();
        return view('dashboard.questions.index', compact('title', 'questions', 'types', 'levels'));
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
        $title = "Questions";
        $types = Type::where('model', 'question')->get();
        $levels = level::all();
        // dd($question);
        return view('dashboard.questions.edit', compact('title', 'question', 'types', 'levels'));
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
        // dd($question);

        $question->name = $request->name;
        $question->type_id = $request->type_id;
        $question->level_id = $request->level_id;

        $question->update();
        // dd($question);

        // لحذف جميع الأسؤلة لتعديل وأضافة عليا من جديد
        $question->answers()->delete();
        // لحذف جميع الأسؤلة لتعديل وأضافة عليا من جديد



        for ($i = 1; $i <= 4; $i++) {
            Answer::create([
                'answer' => $request["answer_$i"],
                'question_id' => $question->id,
                'correct' => ($request['correct'] == $i) ? 1 : 0,
            ]);
        }

        // $answer = Answer::where('question_id' , $question->id)->get();
        // dd($answer);

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
        // dd($question);
        // @mido_shriks لمسح الأسئلة المتعلقة با رقم تعريف با لسؤال
        $question->answers()->delete();
        // @mido_shriks لمسح الأسئلة المتعلقة با رقم تعريف با لسؤال
        $question->delete();

        Alert::toast('deleted successfully question',);
        return redirect()->route('dashboard.questions.index');
    }


    public function delets(Request $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = $request->ids;

        Answer::whereIn('question_id', $ids)->delete();
        Question::whereIn('id', $ids)->delete();
        // $ids->answers()->delete();

        Alert::toast('deleted successfully question all selected',);
        return redirect()->route('dashboard.questions.index');
    }



    public function export()
    {
        Alert::toast('successfully download file',);
        return Excel::download(new QuestionsDemoExport, 'questions_answers.xlsx');
    } // end of function export

    public function export_demo()
    {
        Alert::toast('successfully download file',);
        return Excel::download(new QuestionsDemoExport, 'questions_answers.xlsx');
    } // end of function export demo

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
    } // end of function import
}
