<?php echo form_open_multipart($this->uri->segment(1)."/nicepage-client",array('id'=>'nicepage-client-form', 'class'=> 'form-horizontal pt-4' )) ;?> 
<div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Form Client
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
                    Logo *
                </label>
                <div class="col-sm-6">
                     <input  id="file-logo-upload" type="file" name="logo" required="required">
                     <div class="file-name logo-upload-preview" id="file-logo"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_client">Simpan</button>
        </div>        
</div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan nama dan logo client.</li>
    </ul>
</div>