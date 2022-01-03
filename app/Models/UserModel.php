<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model 
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_name', 'user_fname', 'user_lname','user_oname', 'user_email', 'user_phone', 'user_email', 'user_phone', 'user_pass', 'user_type'];

    protected $useTimestamps = true;
    protected $createdField  = 'user_reg_date';
    protected $updatedField  = 'updated_at';

    public function getUser($email = false)
    {
        if($email === false)
        {
            return $this->findAll();
        }
        return $this->asArray()->where(['email' => $email])->first();
    }
}
?>