<?php
use Timber as Timber;
use Biosciences as Biosciences;

function pretty_print($text) {
	echo '<pre>';
	print_r($text);
	echo '</pre>';
}

$context = Biosciences\Context::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('posts/list.twig', $context);

pretty_print($context);
