<?php

namespace App\Models;

use CodeIgniter\Model;

class OknoModel extends Model
{

    protected $table = 'okna';
    protected $allowedFields = ['hash', 'wlasciciel', 'nazwa', 'imie_wlasciciela'];
    protected $primaryKey ="id";
    
    public function listOkna($wlasciciel=false)
    {
        //Ta funkcja ma zwrócić wszytkie okna, lub okna konkretnego właściciela 
        if ($wlasciciel===false){
            return $this->findAll();
        }

            return $this->where(['wlasciciel'=>$wlasciciel])->findAll();
    }

    public function daneOkna($wlasciciel, $hashOkna){
        return $this->where(['wlasciciel'=>$wlasciciel,'hash'=>$hashOkna])->first();
    }

    function czyJuzJest($sprawdzany_hash){
    $t = $this->where(['hash'=>$sprawdzany_hash])->countAllResults();
    
    return ($t > 0);

    }
    
    public function getEmptyWindows() {
            // Pobieranie okien, które nie mają przypisanych cech
            $this->db->select('okna.id, okna.nazwa, COUNT(przypisane_cechy.okno_johariego) as licznik_cech');
            $this->db->from('okna');
            $this->db->join('przypisane_cechy', 'okna.hash = przypisane_cechy.okno_johariego', 'left');
            $this->db->group_by('okna.id');
            $this->db->having('licznik_cech', 0);

            $query = $this->db->get();
            return $query->result();
        }
    

}