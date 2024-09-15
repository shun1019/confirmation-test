<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        // リクエストデータを取得
        $data = $request->all();

        // 確認画面に渡すデータを整形
        $contact = [
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'tel2' => $data['tel2'],
            'tel3' => $data['tel3'],
            'address' => $data['address'],
            'building' => $data['building'],
            'inquiry_type' => $data['inquiry_type'],
            'detail' => $data['detail'],
        ];

        // 確認画面を表示
        return view('confirm', compact('contact'));
    }

    // フォームの送信処理
    public function store(ContactRequest $request)
    {
        // バリデーション
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
            'tel2' => 'nullable|string',
            'tel3' => 'nullable|string',
            'address' => 'required|string',
            'building' => 'nullable|string',
            'inquiry_type' => 'required|string',
            'detail' => 'required|string',
        ]);

        // データの保存
        Contact::create($validated);

        // 完了画面にリダイレクト
        return redirect()->route('contact.thanks');
    }
}