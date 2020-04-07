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
        $date = new DateTime();
        if ($morning){
            $date = $date->setTime(8, 0, 0);
        } else {
            $date = $date->setTime(12, 0, 0);
        }
        $week = $date->format("W");
        $date = $date->format('Y-m-d H:i:s');
        $sql = "INSERT INTO navets (pseudo, price, morning, date, week) VALUES ('$pseudo', '$price', '$morning', '$date', '$week')";
        $this->db->query($sql);
    }

    public function generateGraphAll($pseudo){
        $sql = 'SELECT * FROM navets WHERE pseudo = "'.$pseudo.'" ORDER BY date';
        $rep = $this->db->query($sql);
        $datas = $rep->FetchAll();
        $prices = "[";
        foreach ($datas as $data){
            if ($data['price'] != 0){
                $prices .= $data['price'].',';
            } else {
                $prices .= 'null,';
            }
        }
        $prices .= "]";
        return $prices;
    }

    public function generateGraphWeek($pseudo){
        $date = new Datetime();
        $week = $date->format("W");
        $sql = 'SELECT * FROM navets WHERE pseudo = "'.$pseudo.'" AND week = "'.$week.'" ORDER BY date';
        $rep = $this->db->query($sql);
        $datas = $rep->FetchAll();
        $prices = "[";
        foreach ($datas as $data){
            if ($data['price'] != 0){
                $prices .= $data['price'].',';
            } else {
                $prices .= 'null,';
            }
        }
        $prices .= "]";
        return $prices;
    }

    public function generateXAyisAll(){
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

    public function generateXAyisWeek(){
        $date = new Datetime();
        $week = $date->format("W");
        $sql = 'SELECT date, morning FROM navets WHERE week = "'.$week.'" ORDER BY DATE';
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