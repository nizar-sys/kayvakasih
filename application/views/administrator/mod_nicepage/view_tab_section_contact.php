<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_contact = isset($get_section_contact) ? $get_section_contact : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Contact
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="section_contact[judul]"  value="<?php echo $get_section_contact['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-8">
                    <textarea  name="section_contact[deskripsi]" rows="5" class="form-control"><?php echo $get_section_contact['deskripsi'];?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Teks
                </label>
                <div class="col-sm-8">
                    <textarea id="section_contact_teks" name="section_contact[text]" rows="5" class="form-control"><?php echo $get_section_contact['text'];?></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Google Map Source
                </label>
                <div class="col-sm-8">
                    <textarea  name="section_contact[embeded_code]" rows="5" class="form-control"><?php echo $get_section_contact['embeded_code'];?></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_contact">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Contact.</li>  
        <li>Isikan informasi pada kolom "Teks" (alamat, telp)</li>
        <li>"Google Map Source" untuk embeded code "iframe" dari googel map, kosongkan jika tidak ada</li> 
    </ul>
</div>
<script>
$(function(){
  $(document).ready(function() {
     $('#section_contact_teks').summernote({
       height: 400,
       toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','height','strikethrough','subscript','superscript','size']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']], 
          ['view', ['codeview', 'help']],
       ]
     });
  });
});
</script> 