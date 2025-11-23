@extends('layouts.app')

@section('title', 'Default Theme')

@push('styles')
    <!-- Theme-specific styles -->
@endpush

@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to the Default Theme</h1>
        <p class="text-lg">This is a modular Blade template with theme support.</p>
    </div>
@endsection
