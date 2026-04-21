<?php $footer_content=$this->common_model->get_data(SETTINGS,array('id'=>1));?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b></b>
    </div>
    <p><?php echo $footer_content[0]['footer_cntnt']?></p>
</footer>
    