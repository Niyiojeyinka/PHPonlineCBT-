<?php
  if($this->pages_model->get_common("post_content") != NULL)
  {

    foreach ($this->pages_model->get_common("post_content") as  $value) {
      echo $value['content'];


    }

  }
   ?>
