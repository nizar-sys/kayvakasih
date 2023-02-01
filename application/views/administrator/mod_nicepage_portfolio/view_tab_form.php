<?php echo form_open_multipart($this->uri->segment(1)."/nicepage-portfolio",array('id'=>'nicepage-portfolio-form', 'class'=> 'form-horizontal pt-4' )) ;?> 
<div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Form Portfolio
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Nama Project *
                </label>
                <div class="col-sm-6">
                    <input id="id" type="hidden" class="form-control" name="id_edit">
                    <input placeholder="Nama Project" id="nama-project" type="text" class="form-control" name="nama_project" required="required">
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Nama Client
                </label>
                <div class="col-sm-6">
                    <input placeholder="Nama Client" id="nama-client" type="text" class="form-control" name="nama_client">
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-6">
                    <textarea placeholder="Deskripsi" name="deskripsi" id="deskripsi"  rows="5"  class="form-control" ></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    URL
                </label>
                <div class="col-sm-6">
                    <input placeholder="https://info.porfolio" id="url" type="text" class="form-control" name="url" >
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Image *
                </label>
                <div class="col-sm-6">
                     <input  id="file-image-upload" type="file" name="image" required="required">
                     <div class="file-name image-upload-preview" id="file-image"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_portfolio">Simpan</button>
        </div>        
</div>
<?php echo form_close();?> 
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan data portfolio.</li>
        <li>URL adalah alamat portfolio, isikan jika ada.</li>
    </ul>
</div>