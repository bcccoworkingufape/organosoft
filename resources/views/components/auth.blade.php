<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    @livewire('navigation-menu')

    <div class="organosoft-main">
        {{ $slot }}

        @if(isset($title))
        <div class="organosoft-main__title">
            <h1>
                {{ $title }}
            </h1>
        </div>
        @endif

        <div class="organosoft-main__body">
            @if(isset($bg_main))
                <div class="organosoft-main__body__container">
                    <main>
                        {{ $bg_main }}
                    </main>
    
                    @if(isset($bottom_buttons))
                        <section class="organosoft-main_bottom-buttons">
                            {{ $bottom_buttons }}
                        </section>
                    @endif
                </div>
            @elseif(isset($no_bg_main))
                <section>
                    {{ $no_bg_main }}
                </section>
            @endif
    
            @if (isset($free))
                {{ $free }}
            @endif

            @if (isset($side_content))
                <aside>
                    {{ $side_content }}
                </aside>
            @endif

        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>
</html>