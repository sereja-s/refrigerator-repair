<?php

namespace controllers;

use models\Category;
use models\Info;
use models\Product;
use models\User;

class SiteController
{
	/**
	 * Action для главной страницы
	 */
	public function actionIndex()
	{

		$info = Info::getInfoById(1);

		$service = Info::getServicesById(1);

		$works = Info::getlistOfWorks();

		// Список категорий для меню-категорий (слева)
		$categories = Category::getCategoriesList();

		//echo '<pre>';
		//var_dump($categories);
		//echo '</pre>';
		//exit;

		// Список новинок
		$latestProducts = Product::getLatestProducts(6);

		// Список товаров для слайдера
		$sliderProducts = Product::getRecommendedProducts();

		// Переменные для формы
		$userName = '';
		$userTel = '';
		$userText = '';
		$result = false;

		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена 
			// Получаем данные из формы
			$userName = $_POST['userName'];
			$userTel = $_POST['userTel'];
			$userText = $_POST['userText'];

			// Флаг ошибок
			//$errors = false;

			// Валидация полей
			/* if (!User::checkPhone($userTel)) {
				$errors[] = 'номер телефона должен содержать не менее 10-ти цифр';
			} */
			// Если ошибок нет
			// Отправляем письмо администратору
			//if ($errors == false) {
			$adminEmail = 'sait_postroen@mail.ru';
			$message = "Текст: {$userTel} . {$userText}. От {$userName}";
			$subject = 'Тема письма';
			$result = mail($adminEmail, $subject, $message);
			$result = true;
			//}
		}

		// Подключаем вид
		require_once('views/site/index.php');
		return true;
	}

	/**
	 * Action для страницы "Контакты" (обратная связь)
	 *
	 */

	/* public function actionContact()
	{

		// Переменные для формы
		$userEmail = '';
		$userText = '';
		$result = false;

		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена 
			// Получаем данные из формы
			$userEmail = $_POST['userEmail'];
			$userText = $_POST['userText'];

			// Флаг ошибок
			$errors = false;

			// Валидация полей
			if (!User::checkEmail($userEmail)) {
				$errors[] = 'Неправильный email';
			}
			// Если ошибок нет
			// Отправляем письмо администратору
			if ($errors == false) {
				$adminEmail = 'gmail@gmail.com';
				$message = "Текст: {$userText}. От {$userEmail}";
				$subject = 'Тема письма';
				$result = mail($adminEmail, $subject, $message);
				$result = true;
			}
		}

		// Подключаем вид
		require_once('views/site/contact.php');

		return true;
	} */

	/**
	 * Action для страницы "О магазине"
	 */
	/* public function actionAbout()
	{
		// Подключаем вид
		require_once('views/site/about.php');
		return true;
	} */
}
