        <footer class="foot">
            <nav class="navigation">
                <h2 class="navigation__title hidden" role="heading" aria-level="2">Navigation du pied de page</h2>
                <ul class="navigation__container">
                    <?php $aFooterNav = fGetNavItems('footer'); ?>
                    <li class="navigation__item">
                        <span class="navigation__item-text">&copy;&nbsp;2017 Designed by </span>
                        <a class="navigation__link" href="<?= $aFooterNav[0]->url; ?>" title="Retour à la page d'accueil" rel="home"><?= $aFooterNav[0]->label; ?></a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="<?= $aFooterNav[1]->url; ?>" title="Mon profil GitHub" rel="external"><?= $aFooterNav[1]->label; ?></a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="<?= $aFooterNav[2]->url; ?>"><?= $aFooterNav[2]->label; ?></a>
                    </li>
                </ul>
            </nav>
        </footer>

        <script type="text/javascript" src="<?php fThemeAsset('/scripts/vendors/jquery-3.2.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php fThemeAsset('/scripts/scripts.min.js'); ?>"></script>

    </body>
</html>
