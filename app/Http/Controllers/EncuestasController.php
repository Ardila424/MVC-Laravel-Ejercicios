<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponse;
use App\Models\ResponseAnswer;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    public function index()
    {
        $surveys = Survey::withCount('responses')->get();
        return view('encuestas.list', compact('surveys'));
    }

    public function create()
    {
        return view('encuestas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array|min:1',
            'questions.*' => 'required|string'
        ]);

        $survey = Survey::create(['title' => $request->title]);

        foreach ($request->questions as $index => $questionText) {
            SurveyQuestion::create([
                'survey_id' => $survey->id,
                'question_text' => $questionText,
                'order' => $index + 1
            ]);
        }

        return redirect()->route('encuestas.index');
    }

    public function answer($id)
    {
        $survey = Survey::with('questions')->findOrFail($id);
        return view('encuestas.answer', compact('survey'));
    }

    public function saveAnswer(Request $request, $id)
    {
        $survey = Survey::findOrFail($id);
        
        $response = SurveyResponse::create(['survey_id' => $survey->id]);

        foreach ($request->answers as $questionId => $answerText) {
            ResponseAnswer::create([
                'response_id' => $response->id,
                'question_id' => $questionId,
                'answer_text' => $answerText
            ]);
        }

        return redirect()->route('encuestas.results', $id);
    }

    public function results($id)
    {
        $survey = Survey::with(['questions', 'responses.answers'])->findOrFail($id);
        return view('encuestas.results', compact('survey'));
    }
}
