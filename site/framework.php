<?php

date_default_timezone_set('America/Mexico_City');

define('ROOT', getcwd());



function error()
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found'); 
    include ROOT . '/_content/error.php';
}

function _include($type, $file, $dataName = null, $data = null)
{
    $file = str_replace('/', '-', $file);
    $file = strpos($file, '-') === 0 ? substr($file, 1) : $file;
    $file = ROOT . '/_' . $type . '/' . $file . '.php';
    if (!file_exists($file)) {
        return error();
    }

    if ($dataName) {
        $$dataName = $data;
    }
    include $file;
}

function partial($partial, $dataName = null, $data = null)
{
    _include('partials', $partial, $dataName, $data);
}

function content($content, $dataName = null, $data = null)
{
    _include('content', $content, $dataName, $data);
}

class Mail 
{
    public function __construct($options)
    {
        $keys = array(
            'from' => 'email', 'to' => 'destinatario', 
            'subject' => 'asunto', 'message' => 'mensaje'
        );
        foreach ($keys as $key => $name) {
            if (empty($options[$key])) {
                throw new InvalidArgumentException("El $name es un campo requerido");
            }
        }
        $this->options = (object) $options;
        $this->options->subject = str_replace(array("\r", "\n"), array('', ''), $this->options->subject);
        $this->options->from = filter_var($this->options->from, FILTER_SANITIZE_EMAIL);
        $this->options->message = htmlentities($this->options->message);
    }

    public function send()
    {
        $headers = array(
            "From: {$this->options->from}",
            "Reply-To: {$this->options->from}"
        );
        $status = mail(
            $this->options->to,
            $this->options->subject,
            $this->options->message,
            implode("\r\n", $headers)
        );
        if (!$status) {
            throw new Exception('Ocurrió un error, por favor intente más tarde');
        }
        return true;
    }

}
