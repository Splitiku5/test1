<?php

namespace Test\Controller;

use Test\Services\ConfigurationService,
    Test\Services\TemplateEngine,
    Test\Validator\Validator;

class IndexController extends BaseController
{
	public function getAction(): void
	{
        $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
		$this->render('layout', [
			'title' => ConfigurationService::getConfig('TITLE'),
			'content' => TemplateEngine::view('pages/index', [
				'error' => $error,
			]),
		]);
	}
    public function postAction(): void
    {
        $error = '';
        $email = Validator::isValidEmail($_POST['email']);
        $nickname = Validator::isValidText($_POST['nickname']);
        $message = Validator::isValidText($_POST['message']);
        if (!$nickname)
        {
            $error = 'Необходимо заполнить полe: Имя пользователя.';
        }
        elseif (!$email)
        {
            $error = 'Необходимо заполнить полe: Email.';
        }
        elseif (!$message)
        {
            $error = 'Необходимо заполнить полe: Сообщение.';
        }
        elseif(isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
        {
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

            if (in_array($fileExtension, $allowedfileExtensions))
            {
                $uploadFileDir = ROOT . '/public/uploads/';
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
            else
            {
                $error = 'Неподходящий формат файла.';
            }
        }
        else
        {
            $error = 'Что-то пошло не так, попоробуйте снова';
        }
        $_SESSION['error'] = $error;
        $text = 'Nickname: ' . $_POST['nickname'] . PHP_EOL . 'Email: ' . $_POST['email'] . PHP_EOL . 'Message: ' . $_POST['message'] . PHP_EOL . 'path to file: ' . $dest_path;
        $filename = ROOT . '/folder/' . time();
        $fp = fopen($filename, 'w');
        fwrite($fp, $text);
        fclose($fp);
        header('Location: /success/ ');
    }
}
