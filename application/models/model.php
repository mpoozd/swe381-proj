<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 

	class Model extends  CI_Model {



			function select_where($select,$table,$where)
			{
				$this->db->select( $select );
				$this->db->from( $table );
				$this->db->where( $where );
				return $this->db->get();
			}
			
			function select_like($select , $table , $q)
			{
				$this->db->select( $select );
				$this->db->from( $table );
				$this->db->like('user_name', $q );
				$this->db->or_like('user_email', $q );
				$query = $this->db->get();
				$result = $query->result();
				if($query->num_rows() == 0)
				return false;
				else
				return $query;
			}
			
			function update_where($where,$table,$data)
			{
					$this->db->where( $where );
					$this->db->update( $table , $data);	
			}
			

	
		function insert_array($table,$data)
		{
			$this->db->insert( $table,$data );
			return $this->db->insert_id();	
		}
		
		function delete_where($where,$tbl_name)
		{
			$this->db->where($where);
			$this->db->delete($tbl_name);
		}
	
	 function select_single_field($select,$table,$where)
		{
			$this->db->select( $select );
			$this->db->from( $table );
			$this->db->where( $where );
			$qry = $this->db->get();
			$rr	=	$qry->row_array();
	
			if($qry->num_rows() >0)
				return	$rr[$select];
	
			else
				return '';
	
		}
		
		
		
		  function login($user_email, $password) {
		    $this->db->select('*');
		    $this->db->from('users');
		    $this->db->where('user_email', $user_email);
		    $this->db->where('password', $password);
		    $this->db->limit(1);
		
		    $query = $this->db->get();
		    $result = $query->result();
		
		    if ($query->num_rows() == 1) {
		     
		      return $result;
		    
		    } else {
		    
		      return false;
		
		    }
		  }

		
		
		
		
		
		
		
		
		
		
		
	
	}?>
	