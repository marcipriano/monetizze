<?php


namespace App\Service;


use App\Exceptions\Exception;

class Lottery
{

    private $dozens;

    private $result;

    private $totalGames;

    private $games;

    function __construct($quantityGames, $quantityDozens){
        //Menor que 6 e maior que 10, o padrão de qtd dezendas serão 6

        $this->setDozens($quantityDozens);
        $this->setTotalGames($quantityGames);
    }

    /*
    * @return int
    */
    public function getDozens() {
        return $this->dozens;
    }

    /*
    * @param $dozen int
    */
    public function setDozens($dozens) {
        if($dozens < 6 || $dozens > 10){
            Throw new \ErrorException('So é permitido o sorteio de dezenas entre 6 e 10!');
        }

        $this->dozens = $dozens;
    }

    /*
    * @return int
    */
    public function getResult() {
        return $this->result;
    }

    /*
    * @param $dozen int
    */
    public function setResult($result) {
        $this->result = $result;
    }

    /*
    * @return int
    */
    public function getTotalGames() {
        return $this->totalGames;
    }

    /*
    * @param $totalGames int
    */
    public function setTotalGames($totalGames) {

        $this->totalGames = $totalGames;
    }

    /*
    * @return array
    */
    public function getGames() {
        return $this->games;
    }

    /*
    * @param $games array
    */
    public function setGames($games) {
        $this->games = $games;
    }

    private function generateDozens() {
        $dozens = $this->fillDozens($this->getDozens());

        sort($dozens, SORT_NUMERIC);

        return $dozens;

    }

    public function generateGames() {
        $games = [];

        for($i=0; $i < $this->getTotalGames(); $i++) {
            $games[$i] = $this->generateDozens();
        }

        $this->setGames($games);

    }

    public function draw() {
        $dozens = $this->fillDozens(6);
        sort($dozens, SORT_NUMERIC);

        $this->setResult($dozens);
    }

    public function checkGame(){

        $valores = array();

        for($i=0; $i<count($this->games); $i++){
            foreach($this->result as $key => $valor){
                if(in_array($valor, $this->games[$i])){
                    $valores[$i][array_search($valor, $this->games[$i])] = $valor;
                }
            }
        }

        return $valores;
    }

    public function initDraw() {
        $this->generateGames();
        $this->draw();

        return $this->checkGame();
    }

    private function fillDozens($quantity, $init = 1, $end = 60) {
        $arr = [];
        for($i=0; $i < $quantity; $i++){
            do {
                $num = rand($init,$end);
            } while(in_array($num, $arr));

            $arr[$i] = $num;
        }

        return $arr;
    }


    public function checkNumber($num){
        return in_array($num, $this->getResult());
    }

    public function hitsByLot($key){
        $hits = 0;
        $game = $this->getGames()[$key];
        for($i = 0; $i < count($game); $i++) {
            if(in_array($game[$i], $this->getResult())) {
                $hits++;
            }
        }

        return $hits;
    }

    public function showTables(){

        $table = $this->tableResult();
        $table .= $this->tableGames();

        return $table;
    }

    public function tableResult(){

        $table = '<table class="table table-hover">';
        $table .= '<thead>';
            $table .= '<tr class="text-center table-active">';
                $table .= '<th colspan="6">Dezenas Sorteadas</th>';
            $table .= '</tr>';
            $table .= '</thead>';
            $table .= '<tbody>';
            $table .= '<tr class="table-info">';

        foreach($this->getResult() as $key => $result) {
            $table .= '<td>' . $result . '</td>';
        }
            $table .= '</tr>';
            $table .= '</tbody>';
        $table .= '</table>';

        return $table;
    }

    public function tableGames(){

        $table = '<table class="table mt-3">';

                $table .=  '<thead>';
                    $table .=  '<tr>';
                        $table .=  '<th class="text-center" colspan="' . $this->getDozens() . '"> Minhas Apostas</th>';
                    $table .=  '</tr>';
                    $table .=  '<tr>';
                        for ($i = 1; $i <= $this->getDozens(); $i++) {
                            $table .= '<th class="text-center" >Nº ' . $i . '</th>';
                        }
                    $table .=  '</tr>';
                $table .=  '</thead>';
                $table .=  '<tbody>';
                    foreach($this->getGames() as $key => $game) {
                        $table .=  '<tr>';
                            $table .=  '<th class="text-center" colspan="' . $this->getDozens() . '" class="table-active"> Aposta Nº ' . ($key + 1) . ' - Total de Acertos: ' . $this->hitsByLot($key) . '</th>';
                        $table .=  '</tr>';
                        $table .=  '<tr>';

                        foreach($game as $dezena) {
                            $table .=  '<td class="text-center text-white ' . (($this->checkNumber($dezena)) ? " bg-success" : "bg-danger") . '">' . $dezena . '</td>';
                        }

                        $table .=  '</tr>';
                    }
        $table .=  '</tbody>';
        $table .=  '</table>';

        return $table;
    }
}
