<?php
namespace App\Http\Controllers\Media;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends BaseController {
    protected $storage;

    public function __construct(){
        $this->storage = app('filesystem');
    }

    // Метод show позволит отдавать (показывать) наши картинки пользователю
    public function show($imagePath) { // принимает путь к картинке, имя картинки и расширение 
        if($this->storage->exists($imagePath)){ // проверяет есть ли этот путь в нашем storage (хранилище)
            $file = $this->storage->get($imagePath); // если есть, то получаем этот файл
            return response($file, 200, ['Content-Type' => $this->storage->mimeType($imagePath)]);
            // отдаем его в виде ответа (response) с флагом 200 и Content-Type (например "image/jpg" или "image/png")
            // MimeType используется для идентификации типа содержимого. Т.е. приложения смогут определять, 
            // какого вида присланы данные и в каком соответствии сети проводить их обработку.
        } else {
            abort(404); // если изображение не найдено, то выдаем ошибку 404 (не найдено)
        }
    }

    // Метод createFile нужен для того, чтобы загрузить файл, создать строчку в таблице медиа и вернуть вызывающей части программы этот объект 
    public function createFile($file) {
        $dataFile = $this->uploadFile($file); // Получаем на вход объект файла, загружаем его в нашу ФС 
        $media = new Media; // Создаем строчку в таблице медиа
        $media->fill($dataFile); // Смотрим в модель Media: 'name', 'extension', 'path', 'size'
        $media->save(); // Берем и сохраняем строчку в таблице media
        return $media; // Возвращаем объект media
    }

    // Метод uploadFile 
    protected function uploadFile($file) { // Как и в прошлом методе получаем файл
        $name = $file->getClientOriginalName(); // Получаем его имя
        $extension = $file->getClientOriginalExtension(); // Получаем расширение
        $realPath = $file->getRealPath(); // Реальный путь к файлу + его наименование + расширение
        $size = $file->getSize(); // Получаем его размер
        $newName = $this->uniqueName($realPath); // Создаем уникальное имя
        $newPath = $this->makePath($newName, $extension); // Строим новый путь в файловой системе (т.е. тот, где будет храниться наш файл)
        $content = File::get($realPath); 
        $this->storage->put($newPath, $content); // Перемещаем файл туда куда нам нужно

        return [ // Отдаем нужные данные для медиа
             'name' => $name, 
             'extension' => $extension, 
             'path' => $newPath, 
             'size' => $size, 
        ];
    }

    // Метод uniqueName 
    protected function uniqueName($path){ // Принимает на вход $realPath
        return md5(md5_file($path).(time().'_'.rand(1, 5000)));
    }
    // md5 и md5_file - хеш-функции, с помощью которых метод возвращает уникальную строку в качестве имени файла 
    // (к примеру: 5e3d0d71fafd50970da7f49fab523887)
    // Хеш-функция – это функция, которая принимает строку любого размера на вход, а отдает строку фиксированного размера.
    // Сначала мы берем md5_file от всего файла. Функция time генерирует текущую временную метку в виде целого числа – 
    // это количество секунд, прошедших с 1 января 1970 (начало эпохи Unix). 
    // Далее функция rand генерирует случайное число от 1 до 5000. 
    // И затем склеивает все это в одну строку и от этой строки берется хеш и получается уникальное имя файла.

    // Здесь будем писать следующую функцию

    // Метод makePath
    protected function makePath($newName, $extension){ // На вход принимает 2 параметра –  это только что сгенерированное 
        // уникальное имя и расширение файла
        $this->storage->makeDirectory(substr($newName, 0, 2)); // Далее метод создает директорию (если она не существует) 
        // из первых 2 символов имени файла. То есть если имя такое «5e3d0d71fafd50970da7f49fab523887», то директория будет «5e»
        $this->storage->makeDirectory(substr($newName, 0, 2).'/'.substr($newName, 2, 2)); // Далее она создает поддиректорию в «5e», 
        // состоящей из вторых двух символов «3d» (т.е. "папку в папке")
        $newPath = substr($newName, 0, 2).'/'.substr($newName, 2, 2).'/'.$newName.'.'.$extension;
        // Затем отправляет новый путь для записи файла, который выглядит для данного пример так: «5e/3d/5e3d0d71fafd50970da7f49fab523887.png»
        return $newPath; // А далее мы уже знаем - он получает файл и записывает его по этому пути
    }

} // эта скобка закрывает ВЕСЬ КЛАСС, который начинался на 8 строчке


