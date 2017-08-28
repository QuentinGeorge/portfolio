        <footer class="foot">
            <nav class="navigation">
                <h2 class="navigation__title hidden" role="heading" aria-level="2">Navigation du pied de page</h2>
                <ul class="navigation__container">
                    <?php $aFooterNav = fGetNavItems('footer'); ?>
                    <li class="navigation__item">
                        <span>&copy; Designed by </span>
                        <a class="navigation__link" href="<?= $aFooterNav[0]->url; ?>" title="Retour à la page d'accueil" rel="home"><?= $aFooterNav[0]->label; ?></a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="<?= $aFooterNav[1]->url; ?>" title="Mon profil GitHub"><?= $aFooterNav[1]->label; ?></a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="<?= $aFooterNav[2]->url; ?>"><?= $aFooterNav[2]->label; ?></a>
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>
