<?php
add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'Main Banner', [
		'label'  => null,
		'labels' => [
			'name'               => 'Main Banner', // основное название для типа записи
			'singular_name'      => 'Main Banner', // название для одной записи этого типа
			// 'add_new'            => 'Add a New Banner', // для добавления новой записи
			// 'add_new_item'       => 'Adding a Banner', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Main Banner', // для редактирования типа записи
			'new_item'           => 'Новое достижение', // текст новой записи
			'view_item'          => 'View Main Banner', // для просмотра записи этого типа.
			'search_items'       => 'Искать достижение', // для поиска по этим типам записи
			'not_found'          => 'Not Found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not Found in Trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Main Banner', // название меню
		],
		'public'                 => true,
		'menu_icon'           => 'dashicons-coffee',
		'supports'            => [ 'title', 'editor', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	] );


}
?>