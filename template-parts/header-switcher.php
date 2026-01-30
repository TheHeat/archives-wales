<?php


// Our header language
//
// A single argument $args is a hash array of options, which accepts the following keys:
// ‘type’ – one of the values: ‘text’, ‘image’, ‘both’, ‘dropdown’ and ‘custom’, which match the choices on widget admin page.
// ‘format’ – needs to be provided if ‘type’ is ‘custom’. Read help text to this option on widget admin page.
// ‘id’ – id of widget, which is used as a distinctive string to create CSS entities.

if ( function_exists( 'qtranxf_load_languages_enabled' ) ) :

	$switcher_args = array( 'type' => 'text' ); ?>
<nav class="languageSwitcher">
    <?php qtranxf_generateLanguageSelectCode( $switcher_args ); ?>
</nav>

<?php endif; ?>
<?php if (function_exists('pll_the_languages')):?>
<ul class='languageSwitcher'>
    <?php pll_the_languages();?>
</ul>
<?php endif ?>