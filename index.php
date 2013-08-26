<?php

function pretty_print($text) {
	echo '<pre>';
	print_r($text);
	echo '</pre>';
}

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('posts/list.twig', $context);

pretty_print($context);
