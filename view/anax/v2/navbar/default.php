<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


foreach ($navbar ?? [] as $item) : ?>
    <li><a href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>"><?= $item["text"] ?></a></li>
<?php endforeach; ?>

<?php if ($app->session->get("login") == true) : ?>
        <li><a href="shop-cms" title="">Shop CMS</a></li>
        <li><a href="blogg-cms" title="">Blogg CMS</a></li>
<?php endif; ?>
