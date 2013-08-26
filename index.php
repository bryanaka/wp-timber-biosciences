<?php

function pretty_print($text) {
	print_r('<pre>' + $text + '</pre>');
}

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('index.twig', $context);

pretty_print($context);
