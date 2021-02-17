<?php 
foreach ($page_section as $key => $value){
	$where = null;
    $where["a.flag"] = 0;
    $where["a.page_section_id"] = $value["id"];
    $page_section_details = $this->db->select('a.*,c.json as json_section')
			                    ->from("page_section_detail a")
			                    ->join("page_section b", "a.page_section_id=b.id", "inner")
			                    ->join("section c", "b.section_id=c.id", "inner")
			                    ->where($where)
			                    ->order_by("order_by")
			                    ->get()
			                    ->result_array();
    $data["contents"] = $page_section_details;
    $data["view"] = $value["view"];

	echo $this->load->view("section/" . $value["view"], $data, TRUE);
}

?>
