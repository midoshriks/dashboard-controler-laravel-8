<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Exports\AnswersExport;
use App\Http\Controllers\Controller;
use App\Imports\AnswersImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::orderby('id')->paginate(3);

        // $answers = Answer::with('dataexcel')->first();

        // dd($answers);

        return view('dashboard.answers.index', compact('answers'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }

    public function export()
    {
        Alert::toast('successfully download file',);
        return Excel::download(new AnswersExport, 'answers.xlsx');
    }

    public function import(Request $request)
    {
        $data = $request->file('file');

        // dd($data);

        $namefile = $data->getClientOriginalName();
        $data->move('excel', $namefile);

        Excel::import(new AnswersImport, \public_path('/excel/' . $namefile));
        // dd($data);
        Alert::toast('successfully Import file',);
        return redirect()->back();
    }
}
