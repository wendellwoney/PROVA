<?php

class ConfiguracaoServico
{
    const URL_SISTEMA = "http://localhost/questao_04_site";

    protected $url;
    protected $data;

    public function __construct($data, $url = null)
    {
        $this->url = "http://localhost/questao_04" . $url;
        $this->data = $data;
    }

    public function get()
    {
        $result = file_get_contents($this->url);
        return $result;
    }

    public function send()
    {
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function sendUpdate()
    {
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($this->data));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function sendDelete()
    {
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($this->data));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}