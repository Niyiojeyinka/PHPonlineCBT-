
 <?php
 if($this->pages_model->get_common("pre_content") != NULL)
 {

   foreach ($this->pages_model->get_common("pre_content") as  $value) {
     echo $value['content'];


   }

 }
  ?>
