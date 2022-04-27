<section class="changelog wow fadeInUp" data-wow-delay=".5s">
    <div class="container">
        <div class="changelog-content">
            <h3 class="changelog__title">
                <span>{!! __('asd.Подпишитесь <br> на обновления электронного музея') !!}
            </h3>
            <p class="changelog__text">
                {{ __('asd.Введите ваш е-mail адрес, чтобы быть в курсе последних публикаций') }} 
            </p>
            <form action="/subscription" class="changelog-form" method="POST">
                @csrf
                <input type="email" placeholder="{{ __('asd.Ваш почтовый ящик') }}" name="mail">
                <button type="submit" class="btn">{{ __('asd.Подписаться') }}</button>
            </form>
            <img src="/img/mailbox.png" alt="mailbox" class="changelog__mailbox">
        </div>
    </div>
</section>