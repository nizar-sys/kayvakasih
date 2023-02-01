<?php echo form_open_multipart($this->uri->segment(1)."/nicepage-team",array('id'=>'nicepage-team-form', 'class'=> 'form-horizontal pt-4' )) ;?> 
<div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Form Team
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Nama *
                </label>
                <div class="col-sm-6">
                    <input id="id" type="hidden" class="form-control" name="id_edit">
                    <input placeholder="Nama"  id="nama" type="text" class="form-control" name="nama" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Jabatan *
                </label>
                <div class="col-sm-6">
                    <input placeholder="Jabatan"  id="jabatan" type="text" class="form-control" name="jabatan"  required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Socmed FB
                </label>
                <div class="col-sm-6">
                <input placeholder="https://facebook.com/nama_akun"  id="socmed-fb" type="text" class="form-control" name="socmed_fb">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Socmed Twitter
                </label>
                <div class="col-sm-6">
                <input placeholder="https://twitter.com/nama_akun"  id="socmed-twitter" type="text" class="form-control" name="socmed_twitter">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Socmed IG
                </label>
                <div class="col-sm-6">
                <input placeholder="https://instagram.com/nama_akun"  id="socmed-ig" type="text" class="form-control" name="socmed_ig">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Socmed LinkedIn
                </label>
                <div class="col-sm-6">
                <input placeholder="https://linkedin.com/nama_akun" id="socmed-linkedin" type="text" class="form-control" name="socmed_linkedin">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Photo *
                </label>
                <div class="col-sm-6">
                     <input id="file-photo-upload" type="file" name="photo" required="required">
                     <div class="file-name" id="file-photo" style="width:200px"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_team">Simpan</button>
        </div>        
</div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan data personal team.</li>         
        <li>Gunakan alamat url untuk akun Socmed (misal: https://facebook.com/nama_akun).</li> 
    </ul>
</div>