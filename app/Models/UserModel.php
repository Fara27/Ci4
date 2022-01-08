<?php namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class UserModel extends Model 
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;

    protected $allowedFields = ['user_name', 'user_fname', 'user_lname','user_oname', 'user_email', 'user_phone' , 'user_pass', 'user_type'];

    //protected $dateFormat = DateTime; 
    //protected $validationRules = [];
    //protected $validationMessages = [];
    //protected $skipValidation = false;

    protected $useTimestamps = true;
    protected $createdField  = 'user_reg_date';
    protected $updatedField  = 'updated_at';

    public function getUser()
    {
        $builder = $this->db->table('users');
        return $builder->get();
    }

    public function setUser($data)
    { 
       
       $query = $this->db->table('users')->insert($data);
        if(! $query){
          var_dump($this->db->error()); 
        } else {
             return $query;
        }
      
    }

    public function viewProduct()
    {
       $builder = $this->db->table($this->table);
        $builder->select('*');
        //$builder->join('category', 'category_id = product_category_id','left');
        return $builder->get();
    }

    public function updateProduct($data, $id)
    {
        $query = $this->db->table('product')->update($data, array('product_id' => $id));
        return $query;
    }

    public function deleteProduct($id)
    {
        $query = $this->db->table('product')->delete(array('product_id' => $id));
        return $query;
    } 
     
}
?>