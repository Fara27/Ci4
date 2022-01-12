<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'products';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['cat_id','product_sub_cat_id','product_image','product_name','product_description','product_SKU','product_price','product_qty','product_attributes','product_reorder_qty','product_unit_of_measure','product_opening_bal','product_mtd_receipts','product_mtd_issues','product_qty_onhand','product_stock_valuation','product_unit_selling_price','product_max_qty','product_stock_asset_acc','product_stock_expense_acc','product_date'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
