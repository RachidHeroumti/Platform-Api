<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\NewPrivateMessage;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'sender' => 'required|integer|exists:users,id',
            'receiver' => 'required|integer|exists:users,id',
        ]);

        $message = Message::create([
            'content' => $validated['content'],
            'sender' => $validated['sender'],
            'receiver' => $validated['receiver'],
        ]);
        broadcast(new NewPrivateMessage($message))->toOthers();

        return response()->json([
            'message' => 'Message sent successfully',
            'data' => $message,
        ]);
    }

    public function getUserMessages(Request $request, $userId)
    {
        $messages = Message::where('sender', $userId)
            ->orWhere('receiver', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'messages' => $messages,
        ]);
    }
}
