@extends('layouts.app')
@section('title', 'OTP Confirmation')
@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">OTP Confirmation</h2>
    <form method="POST" action="{{ route('otp.confirm') }}">
        @csrf
        <div class="mb-4">
            <label for="otp" class="block mb-2">Enter OTP</label>
            <input type="text" name="otp" id="otp" class="w-full border rounded px-3 py-2" required autofocus>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Confirm OTP</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Back to Login</a>
    </div>
</div>
@endsection
