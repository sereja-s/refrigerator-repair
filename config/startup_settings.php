<?php

/**
 *  Стартовые настройки
 */
defined('VG_ACCESS') or die('Access denied'); // проверка константы безопасности
/**
 * Автозагрузка классов
 */
function autoloadMainClasses($class_name)
{

	$class_name = str_replace('\\', '/', $class_name);

	if (!@include_once ($class_name) . '.php') {
		throw new Exception('Не верное имя файла для подкючения - ' . $class_name);
	}
}

spl_autoload_register('autoloadMainClasses');


function routes()
{
	// вернём маршруты (routes): они являются парой в массиве вида: 'запрос пользователя' => 'путь где обрабатывается запрос';
	return [
		// Товар:   
		'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
		// Каталог:   
		'catalog' => 'catalog/index', // actionIndex в CatalogController
		// Категория товаров:  
		// (для постраничной навигации по товарам)  
		'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
		'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController
		// Корзина:   
		'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController    
		'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController  
		'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController 
		// для добавления товара в корзину при помощи асинхронного запроса (ajax)       
		'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
		'cart' => 'cart/index', // actionIndex в CartController    
		// Пользователь:
		'cabinet/edit' => 'cabinet/edit', // редактирование данных (для зарегистрированных пользователей)
		'cabinet' => 'cabinet/index',

		'user/register' => 'user/register', // для регистрации пользователей
		'user/login' => 'user/login', // для доступа пользователя к личным данным (кабинет) на сайте
		'user/logout' => 'user/logout',
		// Управление товарами:    
		'admin/product/create' => 'adminProduct/create',
		'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
		'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
		'admin/product' => 'adminProduct/index',
		// Управление категориями:    
		'admin/category/create' => 'adminCategory/create',
		'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
		'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
		'admin/category' => 'adminCategory/index',
		// Управление заказами:    
		'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
		'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
		'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
		'admin/order' => 'adminOrder/index',
		// Админпанель:
		'admin' => 'admin/index',
		// О магазине
		'contacts' => 'site/contact', // для отправки сообщения от пользователя к администратору
		'about' => 'site/about',
		// Главная страница
		'index.php' => 'site/index', // actionIndex в SiteController   
		'' => 'site/index', // actionIndex в SiteController 

	];
}
