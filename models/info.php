<?php

namespace models;

use components\Db;

/**
 * Класс Product - модель для работы с информацией
 */

class Info
{

	public static function getInfoById($id)
	{
		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = 'SELECT * FROM info WHERE id = :id';

		// Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, \PDO::PARAM_INT);

		// Указываем, что хотим получить данные в виде массива
		// индексированного именами столбцов результирующего набора
		$result->setFetchMode(\PDO::FETCH_ASSOC);

		// Выполнение команды
		$result->execute();

		// Получение и возврат результатов
		return $result->fetch();
	}

	public static function getServicesById($id)
	{
		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = 'SELECT * FROM our_services WHERE id = :id';

		// Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, \PDO::PARAM_INT);

		// Указываем, что хотим получить данные в виде массива
		// индексированного именами столбцов результирующего набора
		$result->setFetchMode(\PDO::FETCH_ASSOC);

		// Выполнение команды
		$result->execute();

		// Получение и возврат результатов
		return $result->fetch();
	}

	/**
	 * Возвращает путь к изображению в блоке с информацией
	 * @param integer $id
	 * @return string <p>Путь к изображению</p>
	 */
	public static function getImage($id)
	{
		// Название изображения-пустышки
		$noImage = 'no-image.png';

		// Путь к папке с информацией для шапки
		$path = '/upload/images/info/';

		// Путь к изображению товара
		$pathToInfoImage = $path . $id . '.png';

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToInfoImage)) {
			// Если изображение для товара существует
			// Возвращаем путь изображения товара
			return $pathToInfoImage;
		}

		// Возвращаем путь изображения-пустышки
		return $path . $noImage;
	}

	public static function getLogoImage($id)
	{
		// Название изображения-пустышки
		$noLogoImage = 'no-logoimage.png';

		// Путь к папке с логотипами
		$path = '/upload/images/logo/';

		// Путь к изображению лоотипа
		$pathToLogoImage = $path . $id . '.png';

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToLogoImage)) {
			// Если изображение логотипа существует
			// Возвращаем путь изображения 
			return $pathToLogoImage;
		}

		// Возвращаем путь изображения-пустышки
		return $path . $noLogoImage;
	}

	public static function getBg($id)
	{
		// Название изображения-пустышки
		$noBg = 'no-bg.jpg';

		// Путь к папке с логотипами
		$path = '/upload/images/bg/';

		// Путь к изображению лоотипа
		$pathToBg = $path . $id . '.jpg';

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToBg)) {
			// Если изображение логотипа существует
			// Возвращаем путь изображения 
			return $pathToBg;
		}

		// Возвращаем путь изображения-пустышки
		return $path . $noBg;
	}
}
