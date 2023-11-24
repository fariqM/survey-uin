<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // baca!!
        // urutan data
        // survey(1)->(n)section(1)->(n)question
        // answer adalah jawaban dengan bind data question
        // entries adalah history saat pengguna melakukan keseluruhan form survey (1 record = 1 submit)
        $survey = $this->getSurvey();
        $userId = auth()->user()->id;
        if (Entry::where('participant_id', $userId)->count() > 0) {
            Session::flash('success','Terima kasih telah mengisi survey kepuasan UINSA, Have a nice day! أتمنى لك يومًا سعيدًا');
            return view('selesai');
        }
        // dd($survey->id);
        return view('home', compact('survey'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $survey = $this->getSurvey();
        $answers = $this->validate($request, $survey->rules, ['required' => 'Mohon lengkapi pernyataan diatas.']);
        (new Entry)->for($survey)->by($user)->fromArray($answers)->push();

        return redirect()->route('selesai')->with('success', 'Terima kasih telah mengisi survey kepuasan UINSA, Have a nice day! أتمنى لك يومًا سعيدًا');
    }

    protected function getSurvey()
    {
        // cek tipe survey
        return Survey::where('name', 'Form Survei Tenaga Kependidik')->first();
    }

    // protected function getUserType(){

    // }
}
