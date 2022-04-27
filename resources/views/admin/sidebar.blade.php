<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            {{-- <span class="logo-sm">
                <img src="/public/img/logo.svg" alt="Museum" height="22">
            </span> --}}
           
            <span class="logo-lg">
                {{-- <img src="/public/img/logo.svg" alt="Museum" height="20"> --}}
                <img src="/img/logo-admin.svg" alt="" style=" padding: 10px; width: 170px;">
            </span>
        </a>

        {{-- <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="/img/logo.svg" alt="Museum" height="22">
            </span>
            <span class="logo-lg">
                <img src="/img/logo.svg" alt="Museum" height="20">
            </span>
        </a> --}}
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    
    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/home">
                        <i class="uil-apps"></i>
                        <span>Панель</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-home-alt"></i>
                        <span>Главная страница</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                                <li><a href="/slayder">• Слайдер</a></li>
                                <li><a href="/about/admin">• О музее</a></li>
                                <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                                        {{-- <i class="uil-home-alt"></i> --}}
                                        <span>• Формы семьи</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="/familyform/1/edit">• Нуклеарная семья</a></li>
                                        <li><a href="/familyform/2/edit">• Большая нераздельная </a></li>
                                    </ul>
                                </li>
                                <li><a href="/quote">• Цитаты</a></li>
                                <li><a href="/minivideo">• Видео карусель</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-book-alt"></i>
                        <span>Законодательство о семье</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                                <li><a href="/information/1/edit">• Республика Узбекистан</a></li>
                                <li><a href="/information/2/edit">• Туркестан </a></li>
                                <li><a href="/information/3/edit">• СССР</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-archway"></i>
                        <span>История Узбекской семьи</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/history/1/edit">• Узбекская семья до ХХв.</a></li>
                        <li><a href="/history/2/edit">• СССР</a></li>
                        <li><a href="/history/3/edit">• Годы независимости</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow waves-effect">
                        <i class="uil-chart-growth-alt"></i>
                        <span>Типология брака и семьи</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/type/1/edit">• Полигамный и моногамный браки</a></li>
                        <li><a href="/type/2/edit">• Левират</a></li>
                        <li><a href="/type/3/edit">• Сорорат</a></li>
                        <li><a href="/type/4/edit">• Брак с колыбели</a></li>
                        <li><a href="/type/5/edit">• Кросскузенный брак</a></li>
                        <li><a href="/type/6/edit">• Религиозный и гражданский браки</a></li>
                        <li><a href="/type/7/edit">• Калым</a></li>
                    </ul>
                </li>

                <li>
                    <a href="/features/1/edit" class="waves-effect">
                        <i class="uil-map-pin-alt"></i>
                        <span>Региональные особенности узбекских семей</span>
                    </a>
                </li>
                <li>
                    <a href="/family" class="waves-effect">
                        <i class="uil-football"></i>
                        <span>Ceмейный церемониал</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-lightbulb-alt"></i>
                        <span>Полезные ресурсы</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                                {{--<li><a href="/useful/2/edit">• Публикации</a></li>--}}
                                <li><a href="/useful/1/edit">• Монографии</a></li>
                                <li><a href="/useful/3/edit">• Научные статьи</a></li>
                                <li><a href="/useful/4/edit">• Диссертации</a></li>
                                <li><a href="/useful/5/edit">• Статьи в СМИ</a></li>
                                <li><a href="/useful/6/edit">• Изречения, пословицы, поговорки, стихи</a></li>
                                {{--<li><a href="/useful/7/edit">• Полезные ссылки</a></li>--}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-image-v"></i>
                        <span>Галерея</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/photos/create">• Фото-галерея </a></li>
                        <li><a href="/videos/create">• Видео-галерея 	</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                            {{-- <i class="uil-home-alt"></i> --}}
                            <span>• Арт-галерея</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="/arts/1/edit">• Декоративно-прикладное искусство</a></li>
                            <li><a href="/arts/2/edit">• Скульптуры </a></li>
                            <li><a href="/arts/3/edit">• Картины </a></li>
                        </ul>
                    </li>
                    
                    </ul>
                </li>

                <li>
                    <a href="/subscription" class="waves-effect">
                        <i class="uil-user-plus"></i><span class="badge rounded-pill bg-info float-end">{{ count(App\Subscription::where('view', 1)->get()) }}</span>
                        <span>Подписки</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-lightbulb-alt"></i>
                        <span>Языки</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        @foreach(App\Lang::all() as $data)
                        <li><a href="/lang/{{ $data->id }}/edit">• {{ $data->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="/feedback" class="waves-effect">
                        <i class="uil-message"></i><span class="badge rounded-pill bg-info float-end">{{ count(App\Feedback::where('view', 0)->get()) }}</span>
                        <span>Обратная связь</span>
                    </a>
                </li>
{{-- 
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-file-alt"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-maintenance.html">Maintenance</a></li>
                        <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-faqs.html">FAQs</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-flask"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-general.html">General</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-rating.html">Rating</a></li>
                        <li><a href="ui-notifications.html">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="uil-shutter-alt"></i>
                        <span class="badge rounded-pill bg-info float-end">9</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html">Basic Elements</a></li>
                        <li><a href="form-validation.html">Validation</a></li>
                        <li><a href="form-advanced.html">Advanced Plugins</a></li>
                        <li><a href="form-editors.html">Editors</a></li>
                        <li><a href="form-uploads.html">File Upload</a></li>
                        <li><a href="form-xeditable.html">Xeditable</a></li>
                        <li><a href="form-repeater.html">Repeater</a></li>
                        <li><a href="form-wizard.html">Wizard</a></li>
                        <li><a href="form-mask.html">Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-list-ul"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Bootstrap Basic</a></li>
                        <li><a href="tables-datatable.html">Datatables</a></li>
                        <li><a href="tables-responsive.html">Responsive</a></li>
                        <li><a href="tables-editable.html">Editable</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-chart"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html">Apex</a></li>
                        <li><a href="charts-chartjs.html">Chartjs</a></li>
                        <li><a href="charts-flot.html">Flot</a></li>
                        <li><a href="charts-knob.html">Jquery Knob</a></li>
                        <li><a href="charts-sparkline.html">Sparkline</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-streering"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-unicons.html">Unicons</a></li>
                        <li><a href="icons-boxicons.html">Boxicons</a></li>
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-location-point"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">Google</a></li>
                        <li><a href="maps-vector.html">Vector</a></li>
                        <li><a href="maps-leaflet.html">Leaflet</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-share-alt"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
