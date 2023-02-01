<?php echo form_open_multipart($this->uri->segment(1)."/nicepage-testimoni",array('id'=>'nicepage-testimoni-form', 'class'=> 'form-horizontal pt-4' )) ;?> 
<div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Form Testimoni
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Nama *
                </label>
                <div class="col-sm-6">
                    <input id="id" type="hidden" class="form-control" name="id_edit">
                    <input placeholder="Nama" id="nama" type="text" class="form-control" name="nama" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Profesi *
                </label>
                <div class="col-sm-6">
                    <input placeholder="Profesi" id="profesi" type="text" class="form-control" name="profesi"  required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Testimoni *
                </label>
                <div class="col-sm-6">
                    <textarea placeholder="Testimoni" id="testimoni" name="testimoni" rows="5" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Photo *
                </label>
                <div class="col-sm-6">
                     <input id="file-photo-upload" type="file" name="photo" required="required">
                     <div class="file-name" id="file-photo" style="width:80px"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_testimoni">Simpan</button>
        </div>        
</div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan testimoni konsumen.</li>
    </ul>
</div>