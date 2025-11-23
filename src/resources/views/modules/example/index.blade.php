@extends('layouts.app')

@section('title', 'Example Module')

@section('content')
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-2xl font-semibold mb-2">Example Module</h2>
        <p>This is a modular view for the Example module.</p>
    </div>
    <livewire:blog-list :posts="$posts ?? []" />
    <livewire:blog-pagination :paginator="$paginator ?? null" />
@endsection
