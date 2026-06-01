<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use App\Models\FundQuestionnaire;
use Illuminate\Http\Request;

class FundQuestionnaireController extends Controller
{
    public function index(Request $request)
    {
        $fundId = session('current_fund_id');

        $questions = FundQuestionnaire::where('fund_id', $fundId)
            ->latest()
            ->get();

        return response()->json([
            'status' => true,
            'data' => $questions,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'question' => 'required|string',
            'description' => 'nullable|string',
            'word_limit' => 'required|integer|min:0',
        ]);
        $fundId = session('current_fund_id');

        $question = FundQuestionnaire::create([
            'fund_id' => $fundId,
            'question' => $request->question,
            'description' => $request->description,
            'word_limit' => $request->word_limit,
            'is_active' => 1,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Question added successfully',
            'data' => $question,
        ]);
    }

    public function edit($id)
    {
        $question = FundQuestionnaire::find($id);

        if (! $question) {
            return response()->json([
                'status' => false,
                'message' => 'Question not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $question,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'description' => 'nullable|string',
            'word_limit' => 'required|integer|min:0',
        ]);

        $question = FundQuestionnaire::find($id);

        if (! $question) {
            return response()->json([
                'status' => false,
                'message' => 'Question not found',
            ], 404);
        }

        $question->update([
            'question' => $request->question,
            'description' => $request->description,
            'word_limit' => $request->word_limit,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Question updated successfully',
            'data' => $question,
        ]);
    }

    public function destroy($id)
    {
        $question = FundQuestionnaire::find($id);

        if (! $question) {
            return response()->json([
                'status' => false,
                'message' => 'Question not found',
            ], 404);
        }

        $question->delete();

        return response()->json([
            'status' => true,
            'message' => 'Question deleted successfully',
        ]);
    }
}
