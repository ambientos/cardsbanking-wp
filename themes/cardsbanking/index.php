<?php get_header(); ?>

<aside class="widget">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <h2 class="widget-title">Новые материалы</h2>
            <div class="widget-subtitle">Актуальные обзоры банковских продуктов</div>

            <?php get_template_part( 'template-parts/layout/archive' ); ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>
    </div>
</aside>

<main class="main">
    <article class="widget">
        <header class="container">
            <h1 class="widget-title">CardsBanking — эксперт по банковским продуктам</h1>
            <div class="widget-subtitle">Всё про дебетовые и кредитные карты, кэшбэк и программы лояльности, пакеты услуг</div>
        </header>
        <div class="widget-custom _expert">
            <div class="container">
                <p>Клиент подтверждает наличие кредитной задолженности в другом банке и  просит погасить ее средствами с карточного счета. Тинькофф переводит  деньги, предоставляет беспроцентную рассрочку.</p>
                <p>Если за 4 месяца долг не  выплачивается, система рассчитывает график погашения по ставке,  согласованной в договоре на обслуживание карты. Воспользоваться правом на рефинансирование можно раз в год. Держатель  пластика через чат или по телефону активирует функцию перевода баланса.</p>
            </div>
        </div>
        <div class="container">
            <p>Клиент подтверждает наличие кредитной задолженности в другом банке и  просит погасить ее средствами с карточного счета. Тинькофф переводит  деньги, предоставляет беспроцентную рассрочку.</p>
            <p>Если за 4 месяца долг не  выплачивается, система рассчитывает график погашения по ставке,  согласованной в договоре на обслуживание карты. Воспользоваться правом на рефинансирование можно раз в год. Держатель  пластика через чат или по телефону активирует функцию перевода баланса.</p>
        </div>
    </article>
</main>

<?php get_footer(); ?>