<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_faq = isset($get_section_faq) ? $get_section_faq : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section FAQs
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-6"> 
                    <input type="text" class="form-control" name="section_faq[judul]"  value="<?php echo $get_section_faq['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-6">
                    <textarea  name="section_faq[deskripsi]" rows="5" class="form-control"><?php echo $get_section_faq['deskripsi'];?></textarea>
                </div>
            </div>
            
            <?php 
                for($fq = 1; $fq <= $get_faq_max; $fq++) {
            ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Faq <?php echo $fq;?>
                </label>
                <div class="col-sm-6">
                    <label>Tanya <?php echo $fq;?></label> 
                    <input type="text" class="form-control" 
                        name="section_faq[tanya_<?php echo $fq;?>]"  value="<?php echo $get_section_faq['tanya_'.$fq];?>">
                    <label>Jawab <?php echo $fq;?></label> 
                    <textarea class="form-control" rows="3" name="section_faq[jawab_<?php echo $fq;?>]"><?php echo $get_section_faq['jawab_'.$fq];?></textarea>
                </div>
            </div> 
            <?php
                }
            ?>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_faq">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi FAQs.</li>  
        <li>Isikan pertanyaan yang sering diajukan beserta jawabannya.</li> 
    </ul>
</div>
<script> 
$(function(){
  $(document).ready(function() {
     $('#section_faq_teks').summernote({
       height: 400,
       toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']], 
          ['view', ['codeview', 'help']],
       ]
     });
  });
}); 
</script>