<?php
 
 
class Admin_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
 
    /*
        Get an specific record from the database
    */
    public function get_by_id($id, $tbl_name)
    {
        $data = $this->db->get_where($tbl_name, ['id' => $id ])->row();
        return $data;
    }

    public function get_data($table, $whr, $type = '', $order_column = '', $order_type = '') 
    {
        $data=array();  
        if($order_column != '' && $order_type != '')
        $this -> db ->order_by($order_column, $order_type);

        $query = $this->db->select('*')->from($table)->where($whr)->get();
        
        if($query->num_rows()>0 ) {
        if (!empty($type)) 
            $data = $query->$type();
        else
            $data = $query->result();

        return $data;
        } else {
        return $data;
        }       
    }
 
    /*
        Update or Modify a record in the database
    */
    public function update_row_data($table_name,$condition, $array) 
    {
        $this->db->where($condition);
        if($this->db->update($table_name, $array)){
            return true;}
        else
            return false;
    }

    public function insert_row($table,$data) 
    {
        if($this->db->insert($table, $data))
            return $this->db->insert_id();
        else
            return false;
    }
 
    public function get_all_products(){
        $sql = "SELECT prod.*, (SELECT category_name FROM categories WHERE id = prod.category_id) as category_name FROM `products` as prod WHERE status = '1'";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0 )
            return $query->result_array();
        else
            return false;
    }

    public function get_all_stocks(){
        $sql = "SELECT g.*, 
                    (SELECT product_name FROM products WHERE id = g.product_id) as product_name,
                    (SELECT supplier_name FROM suppliers WHERE id = g.supplier_id) as supplier_name,
                    SUM(g.no_of_stock) as total_number 
                FROM `godown` as g WHERE g.status = 1 GROUP BY g.product_id, g.supplier_id ORDER BY g.id desc";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0 )
            return $query->result_array();
        else
            return false;
    }

    public function get_stocks_by_supplier($id){
        $sql = "SELECT g.*, 
                    (SELECT product_name FROM products WHERE id = g.product_id) as product_name
                FROM `godown` as g WHERE g.supplier_id = $id AND status = 1 ORDER BY g.id desc";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0 )
            return $query->result_array();
        else
            return false;
    }

}
?>