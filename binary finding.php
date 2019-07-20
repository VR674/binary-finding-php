<!DOCTYPE html>
<html>
<head>
	<title>Finding number</title>
</head>

<body>
	Hello!
	<br>
	<?php
		// входные значения
		$path_to_numbers = "numbers.txt"; // откуда берутся числа
		$the_number = 777; // число, которе необходимо найти

		// Поиск числа
		binary_finding_of_number($path_to_numbers, $the_number);


		/**
		 * Получение данных с файла
		 * @param string $path
		 * return string
		 */
		function get_data_from_file($path)
		{
			$file_data = file_get_contents($path);
			if($file_data == false)
				echo 'Cant take data from file "' . $path . '"';
			else
				return $file_data;
		}


		/**
		 * Бинарный поиск числа
		 * @param string $path_to_numbers
		 * @param integer $the_number
		 * return integer
		 */
		function binary_finding_of_number($path_to_numbers, $the_number)
		{
			$file_data = get_data_from_file($path_to_numbers);
			$numbers = explode(' ', $file_data); 
			
			$length_of_part = count($numbers); // длина рассматриваемой части массива
			$index_of_middle = floor($length_of_part / 2); // идекс середины рассматриваемой части

			// т.к. по условию число обязательно присутствует в входном массиве, то ищем, пока не найдем
			while($numbers[$index_of_middle] != $the_number)
			{
				// каждая новая часть == половине предыдущей части
				$length_of_part = floor($length_of_part / 2);

				if($numbers[$index_of_middle] > $the_number)
				{	
					// перемещение индекса середины части влево
					$index_of_middle -= ceil($length_of_part / 2);
				}
				else
				{
					// перемещение индкеса середины части вправо
					$index_of_middle += ceil($length_of_part / 2);
				}
			}
			echo "Index of the found number is " . $index_of_middle . "<br>";
			return $index_of_middle;
		}
	?>
</body>
</html>