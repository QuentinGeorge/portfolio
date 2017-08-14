        <footer class="foot">
            <nav class="navigation">
                <h2 class="navigation__title hidden" role="heading" aria-level="2">Navigation du pied de page</h2>
                <ul class="navigation__container">
                    <?php $aFooterNav = fGetNavItems('footer'); ?>
                    <li class="navigation__item">
                        <span>&copy; Designed by </span>
                        <a href="<?= $aFooterNav[0]->url; ?>" class="navigation__link"><?= $aFooterNav[0]->label; ?></a>
                    </li>
                    <li class="navigation__item">
                        <a href="<?= $aFooterNav[1]->url; ?>" class="navigation__link"><?= $aFooterNav[1]->label; ?></a>
                    </li>
                    <li class="navigation__item">
                        <a href="<?= $aFooterNav[2]->url; ?>" class="navigation__link"><?= $aFooterNav[2]->label; ?></a>
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>
