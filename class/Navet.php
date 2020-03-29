<?php

class Navet {

    private $db;

    public function __construct(){
        $dsn = 'mysql:dbname=animalcrossing;host=localhost';
        $user = 'animalcrossing';
        $password = 'navets';
        $this->db = new Pdo($dsn, $user, $password);
    }

    public function addCours($pseudo, $price, $morning){
        $sql = "INSERT INTO navets (pseudo, price, morning, date) VALUES ('$pseudo', '$price', '$morning', NOW())";
        $this->db->query($sql);
    }

    public function generateGraph($pseudo){
        $sql = "SELECT * FROM navets WHERE pseudo = '$pseudo' ORDER BY date";
        $rep = $this->db->query($sql);
        $datas = $rep->FetchAll();
        $prices = "[";
        foreach ($datas as $data){
            $prices .= $data['price'].',';
        }
        $prices .= "]";
        return $prices;
    }

    public function generateXAyis(){
        $sql = "SELECT date, morning FROM navets ORDER BY DATE";
        $rep = $this->db->query($sql);
        $datas = $rep->FetchAll();
        $categories = "[";
        $array = array();
        foreach ($datas as $data){
            $date = new DateTime($data['date']);
            $date = $date->format('d-m-Y');
            if ($data["morning"]){
                $date .= " AM";
            } else {
                $date .= " PM";
            }
            array_push($array, $date);
            
        }
        $array = array_unique($array);
        foreach ($array as $data){
            $categories .= "'".$data."',";
        }
        $categories .= "]";
        return $categories;
    }

}