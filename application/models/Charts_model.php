<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts_model extends CI_Model
{
	 public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
    public function basic()
    {
        $points = $this->db->select('points')->from('basic')->get()->result();

        $data = array();

        foreach( $points as $point )
        {
            array_push($data, intval($point->points));
        }
        return $data;
    }

    public function advanced()
    {
        $usersQuery = $this->db->select("
            SUM(if(u.popular = 2, 1, 0)) AS popul,
            SUM(if(u.popular = 1, 1, 0)) AS user,
            c.name as catName",
            false
        )
        ->from("users u")
        ->join("categories c", "u.categoryId = c.id")
        ->group_by("c.id")
        ->get()
        ->result_array();

        $data = array();
        $categories = array();

        foreach( $usersQuery as $user )
        {
            $data['users']['data'][] = intval($user['user']);
            $data['popul']['data'][] = intval($user['popul']);
            $categories["axis"][] = $user['catName'];
        }

        return array(
            "users" => $data["users"]["data"],
            "popul" => $data["popul"]["data"],
            "categories" => array_unique($categories["axis"])
        );
    }
}