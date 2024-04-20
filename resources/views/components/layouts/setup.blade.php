<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Authentication Setup</title>
        @if(config('devdojo.auth.auth.dev'))
            @vite(['packages/devdojo/auth/resources/css/auth.css', 'packages/devdojo/auth/resources/css/auth.js'])
        @else
            <script src="/auth/build/assets/scripts.js"></script>
            <link rel="stylesheet" href="/auth/build/assets/styles.css" />
        @endif
        
    </head>
<body x-data="{ sidebar: false }" class="bg-gray-50 dark:bg-zinc-950">
    <div class="flex flex-col justify-start items-start w-screen h-screen">

        <div :class="{ '-translate-x-80' : !sidebar, 'translate-x-0' : sidebar }" class="fixed left-0 z-50 w-80 h-screen bg-white duration-300 ease-out" x-cloak>
            <div class="flex items-center px-5 space-x-1.5 w-full h-20">
                <x-auth::elements.logo class="w-auto h-7"></x-auth::elements.logo>
                <h1 class="text-base font-bold leading-none">Setup</h1>
            </div>
            <div class="px-5 py-2">
                <a href="https://auth.devdojo.com/docs" target="_blank" class="block p-5 text-xs bg-white rounded-xl border duration-300 ease-out hover:shadow-md opacity-[0.98] hover:opacity-100 border-zinc-200">
                    <span class="flex flex-col">
                        <span class="font-semibold">Learn about configs & setup</span>
                        <span class="underline">Visit the documenation here</span>
                    </span>
                </a>
            </div>
            <x-auth::setup.sidebar-links></x-auth::setup.sidebar-links>
        </div>
        <div x-show="sidebar" @click="sidebar=false" class="fixed z-40 w-screen h-screen bg-black/50" x-cloak></div>

        <div class="flex justify-center items-start w-full h-full">
            {{ $slot }}
        </div>
    </div>
</body>
</html>