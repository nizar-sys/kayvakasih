<?php echo form_open_multipart($this->uri->segment(1)."/nicepage-pengumuman",array('id'=>'nicepage-pengumuman-form', 'class'=> 'form-horizontal pt-4' )) ;?> 
<div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Form Pengumuman
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul *
                </label>
                <div class="col-sm-8">
                    <input id="id" type="hidden" class="form-control" name="id_edit">
                    <input placeholder="Judul" id="judul" type="text" class="form-control" name="judul" required="required">
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi *
                </label>
                <div class="col-sm-8">
                    <textarea placeholder="Deskripsi" id="deskripsi" name="deskripsi" rows="5" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Gambar *
                </label>
                <div class="col-sm-8">
                     <input id="file-gambar-upload" type="file" name="gambar" required="required">
                     <div class="file-name" id="file-gambar" style="width:280px"></div>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Tanggal *
                </label>
                <div class="col-sm-2">  
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input placeholder="Tanggal" id="tanggal" type="text" class="form-control datetimepicker-input"
                            name="tanggal" required="required"  data-toggle="datetimepicker" data-target="#tanggal">
                    </div>
                </div>
            </div>  
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_pengumuman">Simpan</button>
        </div>        
</div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan data pengumuman.</li>
    </ul>
</div>
<script>
$(function(){
  $(document).ready(function() {
     $('#deskripsi').summernote({
       height: 400,
    //    toolbar: [
    //       ['style', ['style']],
    //       ['font', ['bold', 'underline', 'clear','height','strikethrough','subscript','superscript','size']],
    //       ['fontname', ['fontname']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']], 
    //       ['view', ['codeview', 'help']],
    //    ]
     }); 
      
     
     $('#tanggal').datetimepicker({
        defaultDate: "<?php echo date('m/d/Y');?>",
        format: 'L'
     });

  });
});
</script> 