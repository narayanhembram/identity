@php
    $languages = App\Models\Language::all();
    $user = auth()->user();
@endphp
<nav class="navbar-wrapper">
    <div class="navbar-wrapper-area" style="justify-content: unset;">
        <div class="col-md-2">
            <a href="{{ route('home') }}" class="sidebar__main-logo">
                <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png', '?' . time()) }}"
                    alt="{{ config('app.name') }}" style="width: 120px;">
            </a>
        </div>
        {{-- <div class="dashboard-title-part">
            <h5 class="title">{{__($pageTitle)}}</h5>
        </div> --}}
        <div class="col-md-10">
            {{-- <ul class="navbar__action-list">
                <select class="switch-ltr-rtl select-dir mx-2 langSel select" name="lang_switcher">
                    @foreach ($languages as $language)
                    <option value="{{ $language->code }}"
                        @if (Session::get('lang') === $language->code) selected @endif>
                        {{ __($language->name) }}
                    </option>
                    @endforeach
                </select>
                <li class="dropdown">
                    <button type="button" data-bs-toggle="dropdown" data-display="static"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="navbar-user">
                            <span class="navbar-user__thumb"> <img src="{{ getImage(getFilePath('userProfile').'/'.@$user->image,getFileSize('userProfile')) }}"  alt="@lang('user profile')"></span>
                            <span class="navbar-user__info">
                                <span class="navbar-user__name">{{($user->username)}}</span>
                            </span>
                            <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--sm p-0 border-0  dropdown-menu-right">
                        <a href="{{ route('user.profile.setting') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-user-circle"></i>
                            <span class="dropdown-menu__caption">@lang('Profile')</span>
                        </a>
                        <a href="{{ route('user.change.password') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-key"></i>
                            <span class="dropdown-menu__caption">@lang('Password')</span>
                        </a>
                        <a href="{{ route('user.twofactor') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-user-check"></i>
                            <span class="dropdown-menu__caption">@lang('2F Security')</span>
                        </a>
                        <a href="{{route('user.logout')}}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                            <span class="dropdown-menu__caption">@lang('Logout')</span>
                        </a>
                    </div>
                </li>
            </ul> --}}
            <ul class="navbar__action-list">
                {{-- <li><a class="" href="index.html">Dashboard</a></li> --}}

                @foreach (App\Models\Module::orderBy('position', 'asc')->take(5)->get() as $module)
                    <li class="sidebar-menu-item {{ Request::is($module->route) ? 'active' : '' }}">
                        <a href="{{ url('user/' . $module->url) }}">
                            <span class="menu-title">@lang($module->title)</span>
                        </a>
                    </li>
                @endforeach

                {{-- <select class="switch-ltr-rtl select-dir mx-2 langSel select" name="lang_switcher">
                    @foreach ($languages as $language)
                        <option value="{{ $language->code }}" @if (Session::get('lang') === $language->code) selected @endif>
                            {{ __($language->name) }}
                        </option>
                    @endforeach
                </select> --}}

                <li class="sidebar-menu-item dropdown">
                    <button type="button" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="navbar-user">
                            <span class="navbar-user__thumb"> <img
                                    src="{{ getImage(getFilePath('userProfile') . '/' . @$user->image, getFileSize('userProfile')) }}"
                                    alt="@lang('user profile')"></span>
                            <span class="navbar-user__info">
                                <span class="navbar-user__name">{{ $user->username }}</span>
                            </span>
                            <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--sm p-0 border-0  dropdown-menu-right">
                        <a href="{{ route('user.profile.setting') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-user-circle"></i>
                            <span class="dropdown-menu__caption">@lang('Profile')</span>
                        </a>
                        <a href="{{ route('user.change.password') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-key"></i>
                            <span class="dropdown-menu__caption">@lang('Password')</span>
                        </a>
                        <a href="{{ route('user.twofactor') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-user-check"></i>
                            <span class="dropdown-menu__caption">@lang('2F Security')</span>
                        </a>
                        <a href="{{ route('user.logout') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                            <span class="dropdown-menu__caption">@lang('Logout')</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
