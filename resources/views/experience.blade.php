@extends('layouts.app')

@section('title', 'Experience')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-8">Experience & Education</h1>

        <!-- Work Experience -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-6">Work Experience</h2>
            <div class="space-y-6">
                @foreach ($workExperiences as $experience)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold">{{ $experience->position }}</h3>
                                <p class="text-gray-600">{{ $experience->company }}</p>
                            </div>
                            <div class="text-gray-500">
                                {{ $experience->start_date->format('M Y') }} -
                                {{ $experience->is_current ? 'Present' : $experience->end_date->format('M Y') }}
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $experience->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Education -->
        <div>
            <h2 class="text-3xl font-bold mb-6">Education</h2>
            <div class="space-y-6">
                @foreach ($education as $edu)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold">{{ $edu->institution }}</h3>
                                <p class="text-gray-600">{{ $edu->degree }} in {{ $edu->field_of_study }}</p>
                            </div>
                            <div class="text-gray-500">
                                {{ $edu->start_date->format('M Y') }} -
                                {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}
                            </div>
                        </div>
                        @if ($edu->gpa)
                            <p class="text-gray-700">GPA: {{ $edu->gpa }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
