@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <!-- 名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content name-inputs">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                </div>
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                </div>
            </div>
            <!-- エラーメッセージをフィールドの下に配置 -->
            <div class="form__error">
                @error('last_name')
                <p>{{ $message }}</p>
                @enderror
                @error('first_name')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <span>性別</span><span class="form__label--required">※</span>
            </div>
            <div class="form__input--radio">
                <label><input type="radio" name="gender" value="男性" {{ old('gender') == '男性' ? 'checked' : '' }} /> 男性</label>
                <label><input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }} /> 女性</label>
                <label><input type="radio" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }} /> その他</label>
            </div>
            <div class="form__error">
                @error('gender')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="email">メールアドレス</label><span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <input type="email" id="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="tel">電話番号</label><span class="form__label--required">※</span>
            </div>
            <div class="form__input--text-tel">
                <input type="tel" id="tel" name="tel" placeholder="080" value="{{ old('tel') }}" />
                <span>-</span>
                <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                <span>-</span>
                <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
            </div>
            <div class="form__error">
                @error('tel')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="address">住所</label><span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <input type="text" id="address" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
            </div>
            <div class="form__error">
                @error('address')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="building">建物名</label>
            </div>
            <div class="form__input--text">
                <input type="text" id="building" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
            <div class="form__error">
                @error('building')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 問い合わせの種類 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="inquiry_type">お問い合わせの種類</label><span class="form__label--required">※</span>
            </div>
            <div class="form__input--select">
                <select id="inquiry_type" name="inquiry_type">
                    <option value="">選択してください</option>
                    <option value="資料請求" {{ old('inquiry_type') == '資料請求' ? 'selected' : '' }}>資料請求</option>
                    <option value="商品に関する質問" {{ old('inquiry_type') == '商品に関する質問' ? 'selected' : '' }}>商品に関する質問</option>
                    <option value="その他" {{ old('inquiry_type') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="form__error">
                @error('inquiry_type')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 問い合わせ内容 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="detail">お問い合わせ内容</label><span class="form__label--required">※</span>
            </div>
            <div class="form__input--textarea">
                <textarea id="detail" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </div>
            <div class="form__error">
                @error('detail')
                <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 送信ボタン -->
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection