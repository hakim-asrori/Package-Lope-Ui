<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('lopi.title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-900">
    <div class="flex h-screen">
        <aside class="w-64 bg-white border-r border-slate-200 p-4">
            <h1 class="font-bold text-xl mb-6">{{ config('lopi.title') }}</h1>
            <nav class="space-y-1">
            </nav>
        </aside>

        <nav class="space-y-2">
            <a href="{{ route('lopi.index') }}"
                class="block px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-md">
                Dashboard
            </a>

            <div class="pt-4 pb-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                Resources
            </div>

            @foreach ($dashboard->getResources() as $resource)
                <a href="{{ route('lopi.resource.index', $resource::getSlug()) }}"
                    class="block px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-lg transition-colors">
                    {{ $resource::getNavigationLabel() }}
                </a>
            @endforeach
        </nav>

        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
