<?php 
defined ('BASEPATH') or exit ('No direct script acess alloewed');

class M_dadosSensores extends CI_model {
    public function inserir($temperatura, $luminosidade, $umidade){
        try {
            $this->db->query("insert into dados_sensores (temperatura, luminosidade, umidade)
                              values ($temperatura, '$luminosidade', $umidade)");

            if ($this->db->affected_rows() > 0){
                $dados = array('codigo' => 1,
                               'msg' => 'Dados cadastrados corretamente.');
            }else{
                $dados = array('codigo' => 6,
                               'msg' => 'Houve algum problema na tabela sensores.');
            }                  
        } catch (Exception $e) {
            $dados = array('codigo' => 00,
                           'ATENÇÃO>: O seguinte erro aconteceu -> ',
                           $e->getMessage());
        }
         return $dados;
    }
}
?>