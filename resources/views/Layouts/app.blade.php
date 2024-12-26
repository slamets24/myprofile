<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio') - Programmer Portfolio</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold">
                    {{ $profile->full_name ?? 'My Portfolio' }}
                </div>
                <div class="space-x-6">
                    <a href="{{ route('home') }}" class="hover:text-gray-300">Home</a>
                    <a href="{{ route('projects') }}" class="hover:text-gray-300">Projects</a>
                    <a href="{{ route('experience') }}" class="hover:text-gray-300">Experience</a>
                    <a href="{{ route('contact') }}" class="hover:text-gray-300">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div>
                    © {{ date('Y') }} {{ $profile->full_name ?? 'My Portfolio' }}. All rights reserved.
                </div>
                <div class="flex space-x-4">
                    @foreach ($profile->socialMedia ?? [] as $social)
                        <a href="{{ $social->url }}" target="_blank" class="hover:text-gray-300">
                            <i class="fab fa-{{ strtolower($social->platform) }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
