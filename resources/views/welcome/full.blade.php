<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/animate.css">
	<link rel="stylesheet" href="/css/owl.carousel.css">
	<link rel="stylesheet" href="/css/main.css">
	<title>Museum</title>
</head>
<body>

	<audio loop id="playAudio">
		<source src="/audio/music.mp3">
	</audio>

 	@yield('preload')

    <div class="chat">
        <img src="/img/chat.svg" alt="ico">
    </div>
    <div class="zoom-popup">
		<span class="zoom-popup__close">
			<img src="/img/close.svg" alt="ico">
		</span>
        <img src="" alt="gallery" class="zoom-popup__img">

        <div class="zoom-btns">
            <span class="zoom-in">+</span>
            <span class="zoom-out">-</span>
            <span class="reset">Reset</span>
        </div>
    </div>

    <div class="popup-layer"></div>
    <div class="feedback">
        <div class="feedback-content">
            <div class="feedback__close">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.5233 10.6259L19.8269 18.9295L18.912 19.8445L10.6083 11.5408L1.92483 20.2243L0.975346 19.2748L9.65881 10.5914L1.68314 2.61569L2.5981 1.70073L10.5738 9.67639L19.2745 0.975667L20.224 1.92515L11.5233 10.6259Z" fill="white"/>
                </svg>
            </div>
            <h2 class="feedback__title">
                {{ __('asd.Форма обратной связи') }}
            </h2>
            <p class="feedback__text">
                {{ __('asd.Оставьте ваши контактные данные и мы обязательно свяжемся с вами') }}
            </p>
            <div class="feedback-form">
                <form action="/feedback" method="post">
                    @csrf
                    <input name="name" type="text" placeholder="{{ __('asd.Имя') }}">
                    <input name="lastname" type="text" placeholder="{{ __('asd.Фамилия') }}">
                    <input name="phone" type="tel" placeholder="{{ __('asd.Телефон') }}" class="form__tel" maxlength="19" required="" pattern="^[0-9-+\s()]*$">
                    <textarea name="message" placeholder="{{ __('asd.Сообщение') }}"></textarea>
                    <button type="submit" class="btn">{{ __('asd.Отправить') }}</button>
                </form>
            </div>
        </div>
    </div>

	<div class="mobile-menu">
		<div class="container">
			<ul class="menu">
				<li class="menu__item">
					<a class="menu__link">{{ __('asd.Законодательство о семье') }}</a>
					<svg class="menu__item-svg" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.46393 0L8 0.449045L4.00013 4L0 0.449045L0.536183 0L3.64202 2.75679L4.00013 3.07466L4.37554 2.74142L7.46393 0Z" fill="white"/>
					</svg>
					<ul class="submenu">
						<li class="subsubmenu__item">
							<a href="/information/2" class="subsubmenu__link">
								{{ __('asd.Туркестан') }}
							</a>
						</li>
						<li class="subsubmenu__item">
							<a href="/information/3" class="subsubmenu__link">
								{{ __('asd.СССР') }}
							</a>
						</li>
						<li class="subsubmenu__item">
							<a href="/information/1" class="subsubmenu__link">
								 {{ __('asd.Республика Узбекистан') }}
							</a>
						</li>
					</ul>
				</li>
				<li class="menu__item">
					<a class="menu__link">{{ __('asd.История узбекской семьи') }}</a>
					<svg class="menu__item-svg" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.46393 0L8 0.449045L4.00013 4L0 0.449045L0.536183 0L3.64202 2.75679L4.00013 3.07466L4.37554 2.74142L7.46393 0Z" fill="white"/>
					</svg>
					<ul class="submenu">
						@foreach(App\History::where('lang', $lan)->take(3)->get() as $data)
                        <li class="submenu__item">
                            <a href="/history/{{ $data->one_id }}" class="submenu__link">
                                {{ $data->header }}
                            </a>
                        </li>
                        @endforeach
					</ul>
				</li>
				<li class="menu__item">
					<a class="menu__link">{{ __('asd.Типология брака и семьи') }}</a>
					<svg class="menu__item-svg" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.46393 0L8 0.449045L4.00013 4L0 0.449045L0.536183 0L3.64202 2.75679L4.00013 3.07466L4.37554 2.74142L7.46393 0Z" fill="white"/>
					</svg>
					<ul class="submenu">
						@foreach(App\Type::where('lang', $lan)->take(3)->get() as $data)
                        <li class="submenu__item">
                            <a href="/type/{{ $data->one_id }}" class="submenu__link">
                                {{ $data->header }}
                            </a>
                        </li>
                        @endforeach
					</ul>
				</li>
				<li class="menu__item">
					<a href="/features/1" class="menu__link">{{ __('asd.Региональные особенности узбекских семей') }}</a>
				</li>
				<li class="menu__item">
					<a href="/familyall" class="menu__link">{{ __('asd.Семейный церемониал') }}</a>

				</li>
				<li class="menu__item">
					<a href="/useful" class="menu__link">{{ __('asd.Полезные ресурсы') }}</a>
					<svg class="menu__item-svg" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.46393 0L8 0.449045L4.00013 4L0 0.449045L0.536183 0L3.64202 2.75679L4.00013 3.07466L4.37554 2.74142L7.46393 0Z" fill="white"/>
					</svg>
					<ul class="submenu">
						<li class="subsubmenu__item">
							<a href="/useful/1" class="subsubmenu__link">
								{{ __('asd.Монографии') }}
							</a>
						</li>
						<li class="subsubmenu__item">
							<a href="/useful/3" class="subsubmenu__link">
								{{ __('asd.Научные статьи') }}
							</a>
						</li>
						<li class="subsubmenu__item">
							<a href="/useful/4" class="subsubmenu__link">
								{{ __('asd.Диссертации') }}
							</a>
						</li>
						<li class="subsubmenu__item">
							<a href="/useful/5" class="subsubmenu__link">
								{{ __('asd.Статьи в СМИ') }}
							</a>
						</li>
						<li class="submenu__item">
							<a href="/useful/6" class="submenu__link">
								{{ __('asd.Изречения, пословицы, поговорки, стихи') }}
							</a>
						</li>
                        <li class="submenu__item">
                            <a href="/useful/7" class="submenu__link">
                                {{ __('asd.Полезные ссылки') }}
                            </a>
                        </li>
					</ul>
				</li>
				<li class="menu__item">
					<a href="#" class="menu__link">{{ __('asd.Галерея') }}</a>
                    <svg class="menu__item-svg" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.46393 0L8 0.449045L4.00013 4L0 0.449045L0.536183 0L3.64202 2.75679L4.00013 3.07466L4.37554 2.74142L7.46393 0Z" fill="white"/>
                    </svg>
					<ul class="submenu">
						<li class="subsubmenu__item">
                            <a href="/photos" class="subsubmenu__link">
                                 	{{ __('asd.Фото-галерея') }}
                            </a>
                        </li>
                        <li class="subsubmenu__item">
                            <a href="/videos" class="subsubmenu__link">
                                 {{ __('asd.Видео-галерея') }}
                            </a>
                        </li>
                        <li class="subsubmenu__item">
                            <a href="/arts" class="subsubmenu__link">
                                 {{ __('asd.Арт-галерея') }}
                            </a>
                        </li>
					</ul>
				</li>
			</ul>

			<div class="mobile-menu__wrap">
				<div class="header-head__lang">
                    @foreach(\App\Lang::all() as $data)
                        <a href="/languages/{{ $lan }}" alt="ico">
                            @if($data->prefix == $lan)
                                <img src="{{ $data->photo }}" alt="ico">{{ $data->prefix }}
                            @endif
                        </a>
                    @endforeach
                    <svg viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.46393 0L8 0.449045L4.00013 4L0 0.449045L0.536183 0L3.64202 2.75679L4.00013 3.07466L4.37554 2.74142L7.46393 0Z" fill="white"/>
                    </svg>
                    <div class="header-lang__list">
                        @foreach(\App\Lang::all() as $data)
                            @if($data->prefix != $lan)
                                <li>
                                    <a href="/languages/{{ $data->prefix }}">
                                        <img src="{{ $data->photo }}" alt="ico">
                                        <p>
                                            @if($data->id != 6 && $data->id != 7 && $data->id != 4 && $data->id != 5 && $data->id != 8) {{ $data->prefix }}@endif
                                            @if($data->id == 4)ES @endif
                                            @if($data->id == 5)DE @endif
                                            @if($data->id == 6)CN @endif
                                            @if($data->id == 7)KR @endif
                                            @if($data->id == 8)JP @endif
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </div>
				</div>
				<ul class="follow">
					<li class="follow__item">
						<a href="#" class="follow__link" target="_blank">
							<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.5226 6.69676e-06C8.61852 -0.00312719 5.82059 1.09377 3.68977 3.07078C1.55894 5.04779 0.252731 7.75877 0.0330116 10.6602C-0.186708 13.5617 0.696305 16.4391 2.50502 18.7156C4.31373 20.9921 6.91444 22.4994 9.78575 22.9354V15.51H7.24728V12.5474H9.78575V10.3677C9.73399 9.85117 9.79562 9.32956 9.96634 8.83944C10.137 8.34932 10.4127 7.90255 10.774 7.53046C11.1352 7.15837 11.5734 6.86997 12.0576 6.68548C12.5419 6.50099 13.0606 6.42489 13.5773 6.46249C14.3371 6.4595 15.0966 6.49771 15.8523 6.57697V9.22013H14.3006C13.0752 9.22013 12.8384 9.8036 12.8384 10.6594V12.5465H15.7666L15.3851 15.51H12.8384V23C15.7516 22.654 18.4232 21.2071 20.3081 18.9548C22.1929 16.7024 23.149 13.8143 22.9811 10.8797C22.8132 7.94515 21.5341 5.18538 19.4047 3.16356C17.2753 1.14174 14.4562 0.0102543 11.5226 6.69676e-06Z" fill="#ffffff"/>
							</svg>
						</a>
					</li>
					<li class="follow__item">
						<a href="#" class="follow__link" target="_blank">
							<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M16.8792 7.43084C16.7646 7.13302 16.5888 6.86255 16.3631 6.6369C16.1374 6.41124 15.867 6.23541 15.5692 6.12076C15.1587 5.97053 14.7256 5.8918 14.2885 5.888C13.5608 5.85488 13.3428 5.84752 11.5 5.84752C9.65724 5.84752 9.4392 5.85488 8.71148 5.888C8.27417 5.89328 7.841 5.97356 7.43084 6.12536C7.13347 6.2395 6.86328 6.41463 6.63766 6.63946C6.41203 6.8643 6.23596 7.13387 6.12076 7.43084C5.97054 7.84127 5.89181 8.27443 5.888 8.71148C5.85488 9.4392 5.84752 9.65724 5.84752 11.5C5.84752 13.3428 5.85488 13.5608 5.888 14.2885C5.89328 14.7258 5.97357 15.159 6.12536 15.5692C6.24002 15.867 6.41585 16.1374 6.6415 16.3631C6.86716 16.5888 7.13762 16.7646 7.43544 16.8792C7.8456 17.031 8.27877 17.1113 8.71608 17.1166C9.4438 17.1497 9.66184 17.1571 11.5046 17.1571C13.3474 17.1571 13.5654 17.1497 14.2931 17.1166C14.7304 17.1113 15.1636 17.031 15.5738 16.8792C15.8716 16.7646 16.142 16.5888 16.3677 16.3631C16.5934 16.1374 16.7692 15.867 16.8838 15.5692C17.0356 15.159 17.1159 14.7258 17.1212 14.2885C17.1543 13.5608 17.1617 13.3428 17.1617 11.5C17.1617 9.65724 17.1543 9.4392 17.1212 8.71148C17.1145 8.27389 17.0326 7.84072 16.8792 7.43084ZM11.5 15.0429C10.7993 15.0429 10.1143 14.8351 9.53166 14.4458C8.94903 14.0565 8.49493 13.5032 8.22677 12.8558C7.95862 12.2084 7.88845 11.4961 8.02516 10.8088C8.16186 10.1215 8.49929 9.49026 8.99478 8.99477C9.49027 8.49929 10.1216 8.16186 10.8088 8.02515C11.4961 7.88845 12.2084 7.95861 12.8558 8.22677C13.5032 8.49492 14.0565 8.94903 14.4458 9.53166C14.8351 10.1143 15.0429 10.7993 15.0429 11.5C15.0429 12.4396 14.6697 13.3408 14.0052 14.0052C13.3408 14.6696 12.4396 15.0429 11.5 15.0429ZM15.18 8.64432C15.0162 8.64432 14.8562 8.59576 14.72 8.50478C14.5838 8.41379 14.4777 8.28448 14.415 8.13318C14.3524 7.98188 14.336 7.8154 14.3679 7.65478C14.3999 7.49417 14.4787 7.34663 14.5945 7.23083C14.7103 7.11504 14.8579 7.03618 15.0185 7.00423C15.1791 6.97228 15.3456 6.98868 15.4969 7.05135C15.6482 7.11402 15.7775 7.22014 15.8685 7.35631C15.9594 7.49247 16.008 7.65256 16.008 7.81632C16.0085 7.92536 15.9874 8.03343 15.946 8.13431C15.9046 8.23519 15.8437 8.32691 15.7668 8.40418C15.6899 8.48146 15.5984 8.54278 15.4977 8.58462C15.397 8.62646 15.289 8.648 15.18 8.648V8.64432Z" fill="white"/>
								<path d="M11.5 13.8C12.7703 13.8 13.8 12.7703 13.8 11.5C13.8 10.2297 12.7703 9.2 11.5 9.2C10.2297 9.2 9.2 10.2297 9.2 11.5C9.2 12.7703 10.2297 13.8 11.5 13.8Z" fill="white"/>
								<path d="M11.5 0C9.22552 0 7.00211 0.674463 5.11095 1.9381C3.21978 3.20174 1.7458 4.99779 0.87539 7.09914C0.00498275 9.20049 -0.222756 11.5128 0.220974 13.7435C0.664704 15.9743 1.75997 18.0234 3.36828 19.6317C4.97658 21.24 7.02568 22.3353 9.25646 22.779C11.4872 23.2228 13.7995 22.995 15.9009 22.1246C18.0022 21.2542 19.7983 19.7802 21.0619 17.8891C22.3255 15.9979 23 13.7745 23 11.5C23 8.45001 21.7884 5.52494 19.6317 3.36827C17.4751 1.2116 14.55 0 11.5 0ZM18.3586 14.3446C18.3472 14.9172 18.2386 15.4837 18.0375 16.02C17.8602 16.4782 17.5891 16.8943 17.2417 17.2417C16.8943 17.5891 16.4782 17.8602 16.02 18.0375C15.4837 18.2386 14.9172 18.3471 14.3446 18.3586C13.6086 18.3917 13.374 18.4 11.5 18.4C9.62596 18.4 9.39136 18.3917 8.65536 18.3586C8.08278 18.3471 7.51629 18.2386 6.98004 18.0375C6.52183 17.8602 6.1057 17.5891 5.75828 17.2417C5.41086 16.8943 5.13981 16.4782 4.96248 16.02C4.76142 15.4837 4.65285 14.9172 4.6414 14.3446C4.60828 13.6086 4.6 13.374 4.6 11.5C4.6 9.62596 4.60828 9.39136 4.6414 8.65536C4.65285 8.08277 4.76142 7.51628 4.96248 6.98004C5.13981 6.52183 5.41086 6.10569 5.75828 5.75827C6.1057 5.41085 6.52183 5.1398 6.98004 4.96248C7.51629 4.76142 8.08278 4.65285 8.65536 4.6414C9.39136 4.60828 9.62596 4.6 11.5 4.6C13.374 4.6 13.6086 4.60828 14.3446 4.6414C14.9172 4.65285 15.4837 4.76142 16.02 4.96248C16.4782 5.1398 16.8943 5.41085 17.2417 5.75827C17.5891 6.10569 17.8602 6.52183 18.0375 6.98004C18.2386 7.51628 18.3472 8.08277 18.3586 8.65536C18.3917 9.39136 18.4 9.62596 18.4 11.5C18.4 13.374 18.3917 13.6086 18.3586 14.3446Z" fill="white"/>
							</svg>
						</a>
					</li>
					<li class="follow__item">
						<a href="#" class="follow__link" target="_blank">
							<svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.5 0C9.22552 0 7.00211 0.674463 5.11095 1.9381C3.21978 3.20174 1.7458 4.99779 0.87539 7.09914C0.00498274 9.20049 -0.222756 11.5128 0.220974 13.7435C0.664704 15.9743 1.75997 18.0234 3.36828 19.6317C4.97658 21.24 7.02568 22.3353 9.25646 22.779C11.4872 23.2228 13.7995 22.995 15.9009 22.1246C18.0022 21.2542 19.7983 19.7802 21.0619 17.8891C22.3255 15.9979 23 13.7745 23 11.5C23 8.45001 21.7884 5.52494 19.6317 3.36827C17.4751 1.2116 14.55 0 11.5 0ZM17.906 8.72804C17.9124 8.86788 17.9152 9.00404 17.9152 9.14848C17.916 10.8083 17.47 12.4376 16.6241 13.8657C15.7782 15.2937 14.5635 16.4677 13.1075 17.2646C11.6515 18.0614 10.0079 18.4517 8.34914 18.3944C6.69035 18.3371 5.07756 17.8344 3.68 16.939C5.39938 17.1414 7.12922 16.6578 8.49436 15.5931C7.81612 15.5797 7.15898 15.3548 6.61469 14.9499C6.07041 14.545 5.66615 13.9803 5.45836 13.3345C5.94681 13.4294 6.45056 13.4102 6.93036 13.2784C6.19449 13.1297 5.5327 12.731 5.0573 12.15C4.5819 11.5689 4.32216 10.8413 4.32216 10.0906V10.0492C4.77312 10.3008 5.27799 10.4402 5.79416 10.4558C5.10498 9.99676 4.61678 9.29218 4.42909 8.48566C4.24139 7.67915 4.36832 6.83141 4.784 6.11524C5.60051 7.11979 6.61916 7.94141 7.7738 8.52674C8.92845 9.11206 10.1933 9.44802 11.4862 9.5128C11.3232 8.81544 11.3949 8.08379 11.6901 7.43132C11.9854 6.77886 12.4877 6.24205 13.1191 5.90416C13.7505 5.56627 14.4758 5.44619 15.1825 5.56253C15.8891 5.67888 16.5376 6.02515 17.0274 6.54764C17.7554 6.40389 18.4536 6.13694 19.0918 5.75828C18.8492 6.51085 18.3419 7.14989 17.664 7.55688C18.3084 7.48051 18.9376 7.30777 19.5307 7.04444C19.0938 7.69799 18.5436 8.26817 17.906 8.72804Z" fill="white"/>
							</svg>
						</a>
					</li>
				</ul>
				<div class="mobile-menu__eye">
					<a href="#">
						<svg width="28" height="13" viewBox="0 0 28 13" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M21.476 13C25.0791 13 28 10.0899 28 6.5C28 2.91015 25.0791 0 21.476 0C17.8729 0 14.952 2.91015 14.952 6.5C14.952 10.0899 17.8729 13 21.476 13ZM21.476 11.5556C24.2784 11.5556 26.5502 9.29211 26.5502 6.5C26.5502 3.70789 24.2784 1.44444 21.476 1.44444C18.6736 1.44444 16.4018 3.70789 16.4018 6.5C16.4018 9.29211 18.6736 11.5556 21.476 11.5556Z" fill="white"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.52399 13C10.1271 13 13.048 10.0899 13.048 6.5C13.048 2.91015 10.1271 0 6.52399 0C2.92089 0 0 2.91015 0 6.5C0 10.0899 2.92089 13 6.52399 13ZM6.52399 11.5556C9.3264 11.5556 11.5982 9.29211 11.5982 6.5C11.5982 3.70789 9.3264 1.44444 6.52399 1.44444C3.72158 1.44444 1.44978 3.70789 1.44978 6.5C1.44978 9.29211 3.72158 11.5556 6.52399 11.5556Z" fill="white"/>
							<path d="M14.0628 3.50519C13.2713 3.50519 12.5128 3.64561 11.8108 3.90282V5.47354C12.4894 5.13816 13.254 4.94963 14.0628 4.94963C14.7565 4.94963 15.4177 5.08832 16.02 5.33941V3.80276C15.4022 3.60942 14.7447 3.50519 14.0628 3.50519Z" fill="white"/>
						</svg>
						<span>
							{{ __('asd.Версия для слабовиящих') }}
						</span>
					</a>
					<div class="header-style">
						<div class="header-style__color">
							<span class="normal">
								A
							</span>
							<span class="gray">
								A
							</span>
							<span class="invert">
								A
							</span>
						</div>
						<div class="header-style__font">
							<span class="small">
								-
							</span>
							<svg width="25" height="25" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M192 469.668C183.168 469.668 176 462.5 176 453.668V59C176 50.168 183.168 43 192 43C200.832 43 208 50.168 208 59V453.668C208 462.5 200.832 469.668 192 469.668Z" fill="black"></path>
								<path d="M368 128.332C359.168 128.332 352 121.164 352 112.332V75H32V112.332C32 121.164 24.832 128.332 16 128.332C7.16797 128.332 0 121.164 0 112.332V59C0 50.168 7.16797 43 16 43H368C376.832 43 384 50.168 384 59V112.332C384 121.164 376.832 128.332 368 128.332Z" fill="black"></path>
								<path d="M240 469.668H144C135.168 469.668 128 462.5 128 453.668C128 444.836 135.168 437.668 144 437.668H240C248.832 437.668 256 444.836 256 453.668C256 462.5 248.832 469.668 240 469.668Z" fill="black"></path>
								<path d="M314.668 304.332C305.836 304.332 298.668 297.164 298.668 288.332V251C298.668 242.168 305.836 235 314.668 235H496C504.832 235 512 242.168 512 251V283C512 291.832 504.832 299 496 299C487.168 299 480 291.832 480 283V267H330.668V288.332C330.668 297.164 323.5 304.332 314.668 304.332V304.332Z" fill="black"></path>
								<path d="M405.332 469.668C396.5 469.668 389.332 462.5 389.332 453.668V251C389.332 242.168 396.5 235 405.332 235C414.164 235 421.332 242.168 421.332 251V453.668C421.332 462.5 414.164 469.668 405.332 469.668Z" fill="black"></path>
								<path d="M432 469.668H378.668C369.836 469.668 362.668 462.5 362.668 453.668C362.668 444.836 369.836 437.668 378.668 437.668H432C440.832 437.668 448 444.836 448 453.668C448 462.5 440.832 469.668 432 469.668Z" fill="black"></path>
							</svg>
							<span class="big">
								+
							</span>
						</div>
						<div class="header-style__reset">
							<span>reset</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('welcome.header')

	@yield('content')

	@include('welcome.footer')
    <script src="/js/panzoom.min.js"></script>
    <script src="/js/jquery-3.4.1.min.js"></script>
	<script src="/js/wow.min.js"></script>
	<script src="/js/owl.carousel.js"></script>
	<script src="/js/main.js"></script>
    <script src="js/jquery.inputmask.min.js"></script>
    @yield('script')

</body>
</html>
