<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DadosSensores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dadosSensores');
    }

    public function inserir() {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebendo dados via POST
                $temperatura = $this->input->post('temperatura');
                $luminosidade = $this->input->post('luminosidade');
                $umidade = $this->input->post('umidade');

                // Lógica de validação e inserção de dados
                if ($temperatura == '') {
                    $retorno = array('codigo' => 2, 'msg' => "Temperatura não informada");
                } elseif ($luminosidade == '') {
                    $retorno = array('codigo' => 3, 'msg' => "Luminosidade não informada");
                } elseif ($umidade == 0) {
                    $retorno = array('codigo' => 4, 'msg' => "Umidade não informada");
                } else {
                    // Inserir dados no modelo
                    $retorno = $this->M_dadosSensores->inserir($temperatura, $luminosidade, $umidade);
                }
            } else {
                $retorno = array('codigo' => 99, 'msg' => 'ATENÇÃO: Requisição inválida.');
            }
        } catch (Exception $e) {
            $retorno = array('codigo' => 0, 'msg' => 'Erro: ' . $e->getMessage());
        }

        // Retornar resposta em JSON
        echo json_encode($retorno);
    }
}