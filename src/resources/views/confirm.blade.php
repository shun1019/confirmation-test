@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/contacts" method="post">
        @csrf
        <table class="confirm-table">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                    {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">{{ $contact['gender'] }}</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">{{ $contact['email'] }}</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">{{ $contact['tel'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">{{ $contact['address'] }}</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__text">{{ $contact['building'] }}</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__text">{{ $contact['inquiry_type'] }}</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">{{ $contact['detail'] }}</td>
            </tr>
        </table>

        <!-- ボタン -->
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <a href="{{ url()->previous() }}" class="form__button-cancel">修正</a>
        </div>
    </form>
</div>
@endsection