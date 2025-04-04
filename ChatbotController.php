<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiChatService;

class ChatbotController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiChatService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $response = $this->geminiService->chat($request->message);

        return response()->json($response);
    }
}
