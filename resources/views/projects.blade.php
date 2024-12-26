@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-8">My Projects</h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($project->technologies as $tech)
                                <span class="bg-gray-100 px-2 py-1 rounded-full text-sm">{{ $tech->name }}</span>
                            @endforeach
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-4">
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank"
                                        class="text-gray-600 hover:text-gray-800">
                                        <i class="fab fa-github"></i> GitHub
                                    </a>
                                @endif
                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-external-link-alt"></i> Live Demo
                                    </a>
                                @endif
                            </div>
                            <span class="text-sm text-gray-500">
                                {{ $project->start_date->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
