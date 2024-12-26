@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <!-- Hero Section -->
        <div class="flex flex-col lg:flex-row items-center mb-12">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h1 class="text-4xl font-bold mb-4">{{ $profile->full_name }}</h1>
                <p class="text-xl text-gray-600 mb-6">{{ $profile->about_me }}</p>
                <div class="flex space-x-4">
                    <a href="{{ route('contact') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Contact Me
                    </a>
                    <a href="{{ $profile->resume_url }}" target="_blank"
                        class="border border-blue-600 text-blue-600 px-6 py-2 rounded-lg hover:bg-blue-50">
                        Download CV
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2">
                <img src="{{ $profile->profile_picture }}" alt="{{ $profile->full_name }}"
                    class="rounded-full w-64 h-64 object-cover mx-auto">
            </div>
        </div>

        <!-- Skills Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-6">Skills</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($profile->skills as $skill)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="font-bold mb-2">{{ $skill->name }}</h3>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Featured Projects -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-6">Featured Projects</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($profile->projects->take(3) as $project)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-xl mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach ($project->technologies as $tech)
                                    <span class="bg-gray-100 px-2 py-1 rounded-full text-sm">{{ $tech->name }}</span>
                                @endforeach
                            </div>
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
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('projects') }}"
                    class="inline-block bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-900">
                    View All Projects
                </a>
            </div>
        </div>
    </div>
@endsection
