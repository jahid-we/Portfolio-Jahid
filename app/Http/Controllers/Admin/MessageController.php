<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Create New Message Start ************************************
    public function createMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        ContactMessage::create($request->only('name', 'email', 'subject', 'message'));

        return ResponseHelper::Out(true, 'Message Sent Successfully', 200);
    }
    // Create New Message End **************************************

    // GET All Message Start ***************************************
    public function getAllMessage(Request $request)
    {
        if (Auth::check()) {
            $allMessages = ContactMessage::latest()->get();

            return ResponseHelper::Out(true, $allMessages, 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);

        }
    }
    // GET All Message End *******************************************

    // GET Message By Id Start **************************************
    public function getMessageById(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            $message = ContactMessage::where('id', $id)->first();

            if (! $message) {
                return ResponseHelper::Out(false, 'Message Not Found', 404);
            }

            return ResponseHelper::Out(true, $message, 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);
        }
    }
    // GET Message By Id End *****************************************

    // Delete Message By Id Start ***********************************
    public function deleteMessageById(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            $message = ContactMessage::where('id', $id)->first();

            if (! $message) {
                return ResponseHelper::Out(false, 'Message Not Found', 404);
            }
            $message->delete();

            return ResponseHelper::Out(true, 'Message Deleted Successfully', 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);
        }
    }
    // Delete Message By Id End *************************************

    // Delete All Message Start ************************************
    public function deleteAllMessage(Request $request)
    {
        if (Auth::check()) {
            ContactMessage::truncate();

            return ResponseHelper::Out(true, 'All Message Deleted Successfully', 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);
        }
    }
    // Delete All Message End **************************************

}
