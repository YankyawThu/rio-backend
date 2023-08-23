<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Log;

class NotiController extends Controller
{
    use NotificationTrait;

    public function index()
    {
        return view('admin.noti.index');
    }

    public function sendCustomNoti(Request $request)
    {
        $title = $request->title;
        $body = $request->body;
        $response = $this->sendNotification($title, $body);
        Log::info('Custom Noti Res '.$response->body());
        return view('admin.noti.index');
    }
}
