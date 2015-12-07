<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default --}}
        @yield('title', 'Book Picker')
    </title>

    <meta charset='utf-8'>
    <link href="/css/style.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <header>
        <h1>The Happy Book Club&#8217;s Book Picker</h1>
        <h2>... with proportional voting!</h2>
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        <p><a href="/">Home</a></p>
        &copy; {{ date('Y') }}
    </footer>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
