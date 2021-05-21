<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial Record | @yield('page.title')</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    @yield('style')
</head>
<body>

<section>
    <div class="sidebar">
        <div class="top">
            <div class="container">
                <img src="{{ asset('assets/images/financial-logo-full.png') }}" alt="Financial Logo">
            </div>
        </div>

        <div class="menu container">
            <ul>
                @if($user->isAdmin)
                    <li>
                        <a href="{{ route('page.admin.dashboard') }}"
                           class="{{ isPageActive('page.admin.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.categories.index') }}"
                           class="{{ isPageActive('page.categories.', true) }}">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.types.index') }}"
                           class="{{ isPageActive('page.types.', true) }}">
                            <i class="fas fa-tags"></i>
                            <span>Types</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('page.user.dashboard') }}"
                           class="{{ isPageActive('page.user.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.user.report') }}"
                           class="{{ isPageActive('page.user.report') }}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.histories.index') }}"
                           class="{{ isPageActive('page.histories.', true) }}">
                            <i class="fas fa-history"></i>
                            <span>History</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="content-container">
        <div class="top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4">
                        @if($user->isAdmin)
                            <i class="fas fa-users-cog admin-icon" title="Admin Mode"></i>
                        @endif
                    </div>
                    <div class="col-8">
                        <div class="account">
                            <div class="user">
                                <p class="name">{{ $user->name }}</p>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="logout">
                                <a href="{{ route('system.logout') }}" title="logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="title">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-4 text-right">
                        @yield('button')
                    </div>
                </div>
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</section>

</body>
</html>
