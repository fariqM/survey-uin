<?php

namespace App\Http\Controllers;

use App\Imports\SurveyImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use MattDaneshvar\Survey\Models\Survey;

class ImportController extends Controller
{
    public function import()
    {
        $excel = public_path("pertanyaan2.xlsx");
        $sheet = Excel::toArray(new SurveyImport, $excel);
        $data = $sheet[0];

        $surveyDosen = [];
        $surveyTendik = [];
        $surveyMhs = [];
        $surveyMitra = [];
        $surveyLulusan = [];
        $surveyPenggunaLulusan = [];
        $kriteria = '';
        foreach ($data as $key => $value) {
            if ($value[0] !== null) {
                $kriteria = $value[0];
            }
            $pernyataan = $value[2];
            if ($key > 0) {
                // dd($data[0], $value);
                // survey dosen
                if ($value[3] == 'v') {
                    array_push($surveyDosen, [
                        'kriteria' => $kriteria,
                        'pernyataan' => $pernyataan,
                    ]);
                }

                // survey tendik
                if ($value[4] == 'v') {
                    array_push($surveyTendik, [
                        'kriteria' => $kriteria,
                        'pernyataan' => $pernyataan,
                    ]);
                }

                // survey mhs
                if ($value[5] == 'v') {
                    array_push($surveyMhs, [
                        'kriteria' => $kriteria,
                        'pernyataan' => $pernyataan,
                    ]);
                }

                // survey mitra
                if ($value[6] == 'v') {
                    array_push($surveyMitra, [
                        'kriteria' => $kriteria,
                        'pernyataan' => $pernyataan,
                    ]);
                }

                // survey lulusan
                if ($value[7] == 'v') {
                    array_push($surveyLulusan, [
                        'kriteria' => $kriteria,
                        'pernyataan' => $pernyataan,
                    ]);
                }

                // survey pengguna lulusan
                if ($value[8] == 'v') {
                    array_push($surveyPenggunaLulusan, [
                        'kriteria' => $kriteria,
                        'pernyataan' => $pernyataan,
                    ]);
                }
            }
        }
        $this->setSurveyDosen($surveyDosen);
        $this->setSurveyTendik($surveyTendik);
        $this->setSurveyMhs($surveyMhs);
        $this->setSurveyMitra($surveyMitra);
        $this->setSurveyLulusan($surveyLulusan);
        $this->setSurveyPenggunaLulusan($surveyPenggunaLulusan);

        return redirect()->route('home')->with('success', 'Data berhasil diimport');
        // dd("ok");
        // dd($surveyDosen, $surveyTendik, $surveyMhs, $surveyMitra, $surveyLulusan, $surveyPenggunaLulusan);
    }

    public function setSurveyDosen($dataPernyataan)
    {
        $survey = Survey::create(['name' => 'Form Survei Dosen', 'settings' => ['limit-per-participant' => 1]]);
        $kriteria = '';
        $section = '';
        foreach ($dataPernyataan as $key => $value) {
            if ($kriteria !== $value['kriteria']) {
                $kriteria = $value['kriteria'];
                $section = $survey->sections()->create(['name' => $kriteria]);
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            } else {
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            }

        }
    }

    public function setSurveyTendik($dataPernyataan)
    {
        $survey = Survey::create(['name' => 'Form Survei Tenaga Kependidik', 'settings' => ['limit-per-participant' => 1]]);
        $kriteria = '';
        $section = '';
        foreach ($dataPernyataan as $key => $value) {
            if ($kriteria !== $value['kriteria']) {
                $kriteria = $value['kriteria'];
                $section = $survey->sections()->create(['name' => $kriteria]);
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            } else {
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            }

        }
    }

    public function setSurveyMhs($dataPernyataan)
    {
        $survey = Survey::create(['name' => 'Form Survei Mahasiswa', 'settings' => ['limit-per-participant' => 1]]);
        $kriteria = '';
        $section = '';
        foreach ($dataPernyataan as $key => $value) {
            if ($kriteria !== $value['kriteria']) {
                $kriteria = $value['kriteria'];
                $section = $survey->sections()->create(['name' => $kriteria]);
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            } else {
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            }

        }
    }

    public function setSurveyMitra($dataPernyataan)
    {
        $survey = Survey::create(['name' => 'Form Survei Mitra Tridharma', 'settings' => ['limit-per-participant' => 1]]);
        $kriteria = '';
        $section = '';
        foreach ($dataPernyataan as $key => $value) {
            if ($kriteria !== $value['kriteria']) {
                $kriteria = $value['kriteria'];
                $section = $survey->sections()->create(['name' => $kriteria]);
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            } else {
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            }

        }
    }

    public function setSurveyLulusan($dataPernyataan)
    {
        $survey = Survey::create(['name' => 'Form Survei Lulusan', 'settings' => ['limit-per-participant' => 1]]);
        $kriteria = '';
        $section = '';
        foreach ($dataPernyataan as $key => $value) {
            if ($kriteria !== $value['kriteria']) {
                $kriteria = $value['kriteria'];
                $section = $survey->sections()->create(['name' => $kriteria]);
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            } else {
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            }

        }
    }

    public function setSurveyPenggunaLulusan($dataPernyataan)
    {
        $survey = Survey::create(['name' => 'Form Survei Pengguna Lulusan', 'settings' => ['limit-per-participant' => 1]]);
        $kriteria = '';
        $section = '';
        foreach ($dataPernyataan as $key => $value) {
            if ($kriteria !== $value['kriteria']) {
                $kriteria = $value['kriteria'];
                $section = $survey->sections()->create(['name' => $kriteria]);
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            } else {
                $section->questions()->create([
                    'content' => $value['pernyataan'],
                    'type' => 'radio',
                    'options' => ['Sangat Tidak Puas', 'Tidak Puas', 'Puas', 'Sangat Puas'],
                    'rules' => ['required'],
                ]);
            }

        }
    }
}
