@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold mb-8">Contact Me</h1>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="font-bold mb-2">Email</h3>
                        <p class="text-gray-600">{{ $profile->email }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Phone</h3>
                        <p class="text-gray-600">{{ $profile->phone }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Location</h3>
                        <p class="text-gray-600">{{ $profile->address }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Social Media</h3>
                        <div class="flex space-x-4">
                            @foreach ($profile->socialMedia as $social)
                                <a href="{{ $social->url }}" target="_blank" class="text-gray-600 hover:text-gray-800">
                                    <i class="fab fa-{{ strtolower($social->platform) }} text-2xl"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Send Message</h2>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" name="email" required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                            Message
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="message" name="message" rows="6" required></textarea>
                    </div>
                    <div class="flex items-center justify-end">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
