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
    @if(Session::get('flash_message') != null)
      <div class='flash_message'>{{ Session::get('flash_message') }}</div>
    @endif

    <header>
        <h1>The Happy Book Club&#8217;s Book Picker</h1>
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
      <div>
        <nav>
          <ul>
              @if(Auth::check())
                 <li><a href="/">Home</a></li>
                 <li><a href='/books'>Books</a></li>
                 <li><a href="/meetings">Meetings</a></li>
                 <li><a href="/ballots">Ballots</a></li>
                 <li><a href="/logout">Logout</a></li>
              @else
                <li><a href="/">Home</a></li>
                <li><a href='/books'>Books</a></li>
                <li><a href="/meetings">Meetings</a></li>
                <li><a href="/ballots">Ballots</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
              @endif
          </ul>
        </nav>
      </div>

    </footer>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
