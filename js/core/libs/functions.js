/**
 * Корректный url - alias
 * @param string str
 * @returns string Создает корректный url
 */
function aliasCorrect(str) {
	str = str.toLowerCase();
	var newstr = [];
	var rus = ['Ё', 'Ё', 'Ж', 'Ж', 'Ч', 'Ч', 'Щ', 'Щ', 'Щ', 'Ш', 'Ш', 'Э', 'Э', 'Ю',
		'Ю', 'Я', 'Я', 'ч', 'ш', 'щ', 'э', 'ю', 'я', 'ё', 'ж', 'A', 'Б', 'В', 'Г',
		'Д', 'E', 'З', 'И', 'Й ', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
		'Ф', 'Х', 'Ц', 'Ы', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л',
		'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х ', 'ц', 'ы', 'Ъ', 'ъ', 'Ь',
		'ь', '-'];
	var eng = ['YO', 'Yo', 'ZH', 'Zh', 'CH', 'Ch', 'SHC', 'SHc', 'Shc', 'SH',
		'Sh', 'YE', 'Ye', 'YU', 'Yu', 'YA', 'Ya', 'ch', 'sh', 'shc', 'ye', 'yu',
		'ya', 'yo', 'zh', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'Y', 'K', 'L',
		'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'X', 'a', 'b', 'v',
		'g', 'd', 'e', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't',
		'u', 'f', 'h', 'c', 'i', '', '', '', '', '-'];

	for (var i = 0; i < str.length; i++) {
		newstr[i] = str[i].replace(/([^a-zA-Z0-9])/, '-');
		for (var j = 0; j < rus.length; j++) {
			if (str[i] == rus[j] || str[i] == eng[j]) {
				newstr[i] = str[i].replace(rus[j], eng[j]);
			}
		}
	}
	var alias = newstr.join('');
	alias = alias.replace(/\-+/, '-');

	return alias;
}

/**
 * Добавление пробелов в больших числах
 * @param string nStr
 * @returns string
 */
function getNamberWithSpace(prixe){
	prixe = prixe + '';
	return prixe.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
}
