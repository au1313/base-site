@extends('layouts.' . (isset($layout) ? $layout : 'master'))

@section('meta')
    @include('partials.meta')
@endsection

@section('content-area')
    @yield('top')

    @if(!empty($hero) && $site_menu['meta']['has_selected'] == false && config('app.hero_contained') === false)
        @include('components.hero', ['images' => $hero])
    @endif

    <div class="row">
        <div class="small-12 medium-3 columns main-menu @if($site_menu['meta']['has_selected'] == false && ((isset($show_site_menu) && $show_site_menu != true) || !isset($show_site_menu))) hide-for-menu-top-up @endif" id="mainMenu" data-off-canvas role="navigation">
            @if(!empty($top_menu_output) && $site_menu !== $top_menu)
                <div class="offcanvas-main-menu">
                    <ul>
                        <li>
                            <a class="main-menu">Main Menu</a>

                            {!! $top_menu_output !!}
                        </li>
                    </ul>
                </div>
            @endif

            @if(!empty($site_menu_output))
                {!! $site_menu_output !!}
            @endif

            @yield('below_menu')

            @if(!empty($under_menu))
                @include('components.image-list', ['images' => $under_menu, 'class' => 'under-menu'])
            @endif
        </div>

        <div class="small-12 @if($site_menu['meta']['has_selected'] == false && ((isset($show_site_menu) && $show_site_menu != true) || !isset($show_site_menu)))medium-12 @else medium-9 @endif columns content" data-off-canvas-content>

            @if(!empty($hero) && ($site_menu['meta']['has_selected'] == true || config('app.hero_contained') === true))
                @include('components.hero', ['images' => $hero, 'class' => 'hero--childpage'])
            @endif

            @if(!empty($breadcrumbs))
                @include('partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
            @endif

            @yield('content')
        </div>
    </div>

    @yield('bottom')
@endsection
