<?php namespace App\Models;

use CodeIgniter\Model;

class ShorturlModel extends Model {
    protected $table = 'tb_shorturl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullurl','shorturl','ip','view'];

    public function getShorturl($slug = false)
    {
        if($slug === false){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['shorturl' => $slug])
                    ->first();
    }

    public function getId($id)
    {
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function gotourl($slug)
    {
       
            $datalist = $this->asArray()
            ->where(['shorturl' => $slug])
            ->first();

            $this->set('view', $datalist['view'] +1 );
            $this->where('shorturl', $slug);
            $this->update();
            
        

    }

    public function deleteid($id)
    {
        $this->delete(['id' => $id]);

    }

}