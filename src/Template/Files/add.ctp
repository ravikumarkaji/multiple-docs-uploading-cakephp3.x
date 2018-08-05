<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
 */
?>
<script type="text/javascript" src="http://php-practices.com/multiple-file-uploading/webroot/js/jquery3.3.1.min.js">

</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="files form large-9 medium-8 columns content">
    <?= $this->Form->create($file,['type'=>'file','class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Add File') ?></legend>
        <?php
            echo $this->Form->control('candidate_name');
            echo $this->Form->control('file_number');
            // echo $this->Form->control('uploaded_docs[0]',['type'=>'file','label'=>false, 'class' => 'btn btn-primary', 'required' => true]);

        ?>
        <div id="div_0">
            <span style="float:left;background-color: #8a7c7c;line-height: 3;border-left: solid red 5px;"><input type="file" name="uploaded_docs[0]" required="required"></span><span style="float:left"><button onclick="removeIncD(div_0)" type="button" class="btn btn-default btn-md" style="margin-right: 20px;"><span ></span>&times;</button></span>
        </div>

        <div class="form-group" id="docs">                                   
        </div>
         
    </fieldset>
    <input type="button" id="more_fields" onclick="append_child('docs');" value="Add More docs +" class="btn btn-primary btn-sm"/>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<script type="text/javascript">
    var incV=1;
    function append_child(div_id){
        var objTo = document.getElementById(div_id);
        var divtest = document.createElement(div_id);
        divtest.innerHTML = '<div id="div_'+incV+'"><span style="float:left;background-color: #8a7c7c;line-height: 3;border-left: solid red 5px;"><input type="file" name="uploaded_docs['+incV+']" required="required"></span><span style="float:left"><button onclick="removeIncD(div_'+incV+')" type="button" class="btn btn-default btn-md" style="margin-right: 20px;"><span ></span>&times;</button></span></div>';
        objTo.appendChild(divtest);
        incV++;
    }
</script>
<script type="text/javascript">
    function removeIncD(identifier) {
        $(identifier).remove();
    }
</script>
