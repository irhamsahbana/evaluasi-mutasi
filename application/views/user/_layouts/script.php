    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/admin/'); ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/styleSwitcher.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/jquery-3.4.1.js"></script>
    <!-- script table -->
    <script src="<?= base_url('assets/admin/'); ?>plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            
        <?php 
        $myURI = $this->uri->segment(2);

        if($myURI == 'tampilanDataPegawai' || $myURI == 'tampilanAddUsulanLembarEvaluasi') {
        ?>
            
            $('#add_area').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '<option value="">Pilih Salah Satu</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].personnel_subarea+'>'+data[i].nama_personnel_subarea+'</option>';
                        }
                        $('#add_subarea').html(html);
 
                    }
                });
                return false;
            }); 

            $('#add_subarea').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getSebutanJabatan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '<option value="">Pilih Salah Satu</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_sebutan_jabatan+' title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                        }
                        $('#add_jabatan').html(html);
 
                    }
                });
                return false;
            });             

        <?php } ?>

        <?php if($myURI == 'getEditPegawai') { ?>

            getDataEditPegawai();

            $('.edit-area').change(function(){ 
                var id=$(this).val();
                var personnel_subarea = "<?=$subarea_id?>" 
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="personnel_subarea"]').empty();
 
                        $.each(data, function(key, value) {
                            if(personnel_subarea==value.personnel_subarea){
                                $('select[name="personnel_subarea"]').append('<option value="'+ value.personnel_subarea +'" selected>'+ value.nama_personnel_subarea +'</option>').trigger('change');
                            }else{
                                $('select[name="personnel_subarea"]').append('<option value="'+ value.personnel_subarea +'">'+ value.nama_personnel_subarea +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 


            $('.edit-subarea').change(function(){ 
                var id=$(this).val();
                var id_sebutan_jabatan = "<?=$jabatan_id?>";
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getSebutanJabatan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="sebutan_jabatan"]').empty();
 
                        $.each(data, function(key, value) {
                            if(id_sebutan_jabatan==value.id_sebutan_jabatan){
                                $('select[name="sebutan_jabatan"]').append('<option value="'+ value.id_sebutan_jabatan +'" selected>'+ value.sebutan_jabatan +'</option>').trigger('change');
                            }else{
                                $('select[name="sebutan_jabatan"]').append('<option value="'+ value.id_sebutan_jabatan +'" title="'+ value.sebutan_jabatan +'">'+ value.sebutan_jabatan +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            });

            function getDataEditPegawai(){
                var nip = $('[name="nipeg"]').val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getDataEditPegawai');?>",
                    method : "POST",
                    data : {nip : nip},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="pers_no"]').val(data[i].pers_no);
                            $('[name="nama_pegawai"]').val(data[i].nama_pegawai);
                            $('[name="business_area"]').val(data[i].business_area).trigger('change');
                            $('[name="personnel_subarea"]').val(data[i].personnel_subarea).trigger('change');
                            $('[name="sebutan_jabatan"]').val(data[i].id_sebutan_jabatan).trigger('change');
                            $('[name="org_unit"]').val(data[i].org_unit);
                            $('[name="organizational_unit"]').val(data[i].organizational_unit);
                            $('[name="position"]').val(data[i].position);
                            $('[name="nama_panjang_posisi"]').val(data[i].nama_panjang_posisi);
                            $('[name="jenjang_main_grp"]').val(data[i].jenjang_main_grp);
                            $('[name="jenjang_sub_grp"]').val(data[i].jenjang_sub_grp);
                            $('[name="grade"]').val(data[i].grade);
                            $('[name="tgl_grade"]').val(data[i].tgl_grade);
                            $('[name="pendidikan_terakhir"]').val(data[i].pendidikan_terakhir);
                            $('[name="tanggal_lahir"]').val(data[i].tgl_lahir);
                            $('[name="tanggal_capeg"]').val(data[i].tgl_capeg);
                            $('[name="tanggal_pegawai_tetap"]').val(data[i].tgl_pegawai_tetap);
                            $('[name="gender"]').val(data[i].gender);
                            $('[name="email"]').val(data[i].email);
                            $('[name="tanggal_masuk"]').val(data[i].tgl_masuk);
                            $('[name="religious"]').val(data[i].agama);
                            $('[name="telephone_no"]').val(data[i].no_telp);
                        });
                    }
 
                });
            }

        <?php } ?>

        <?php if($myURI == 'tampilanAdministrator' || $myURI == 'tampilanJabatan') { ?>

            $('#add_area').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '<option value="">Pilih Salah Satu</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].personnel_subarea+'>'+data[i].nama_personnel_subarea+'</option>';
                        }
                        $('#add_subarea').html(html);
 
                    }
                });
                return false;
            }); 

        <?php } ?>

        <?php if($myURI == 'getEditAdmin') { ?>

            getDataEditAdmin();

            $('.edit-area').change(function(){ 
                var id=$(this).val();
                var personnel_subarea = "<?=$subarea_id?>" 
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="personnel_subarea"]').empty();
 
                        $.each(data, function(key, value) {
                            if(personnel_subarea==value.personnel_subarea){
                                $('select[name="personnel_subarea"]').append('<option value="'+ value.personnel_subarea +'" selected>'+ value.nama_personnel_subarea +'</option>').trigger('change');
                            }else{
                                $('select[name="personnel_subarea"]').append('<option value="'+ value.personnel_subarea +'">'+ value.nama_personnel_subarea +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 

            function getDataEditAdmin(){
                var id_administrator = $('[name="id_administrator"]').val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getDataEditAdmin');?>",
                    method : "POST",
                    data : {id_administrator : id_administrator},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="nip"]').val(data[i].nip);
                            $('[name="status"]').val(data[i].role);
                            $('[name="business_area"]').val(data[i].business_area).trigger('change');
                            $('[name="personnel_subarea"]').val(data[i].personnel_subarea).trigger('change');
                        });
                    }

                });
            }

        <?php } ?>

        <?php if($myURI == 'getEditJabatan') { ?>

            getDataEditJabatan();

            $('.edit-area').change(function(){ 
                var id=$(this).val();
                var personnel_subarea = "<?=$subarea_id?>" 
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
 
                        $('select[name="personnel_subarea"]').empty();
 
                        $.each(data, function(key, value) {
                            if(personnel_subarea==value.personnel_subarea){
                                $('select[name="personnel_subarea"]').append('<option value="'+ value.personnel_subarea +'" selected>'+ value.nama_personnel_subarea +'</option>').trigger('change');
                            }else{
                                $('select[name="personnel_subarea"]').append('<option value="'+ value.personnel_subarea +'">'+ value.nama_personnel_subarea +'</option>');
                            }
                        });
 
                    }
                });
                return false;
            }); 

            function getDataEditJabatan(){
                var id_sebutan_jabatan = $('[name="id_sebutan_jabatan"]').val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getDataEditJabatan');?>",
                    method : "POST",
                    data : {id_sebutan_jabatan : id_sebutan_jabatan},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="business_area"]').val(data[i].business_area).trigger('change');
                            $('[name="personnel_subarea"]').val(data[i].personnel_subarea).trigger('change');
                            $('[name="urutan"]').val(data[i].urutan_dalam_org);
                            $('[name="jabatan"]').val(data[i].sebutan_jabatan);
                        });
                    }

                });
            }

        <?php } ?>

        });
    </script>

<?php if ($this->uri->segment(1) == 'AdministratorInduk' && $this->uri->segment(2) == 'tampilanAddUsulanLembarEvaluasi'): ?>
    <script>
        $(document).ready(function(){
            
            //Begin AutoFill
                $('#nip_usulan').keyup(function(){
                    var nip = $('#nip_usulan').val();
                    $.ajax({
                        url : '<?= site_url('AdministratorInduk/autoFillUsulanPegawai'); ?>',
                        data : {'nip' : nip},
                        type : 'post',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            $.each(data, function(i, item){
                                $('#nama_usulan').val(data[i].nama_pegawai).attr('title', data[i].nama_pegawai);
                                $('#jabatan_skg').val(data[i].sebutan_jabatan).attr('title', data[i].sebutan_jabatan);
                            });
                        }
                    });
                });      
            //End AutoFill

            var count_pegawai = 1;
            var count_approval = 1;

            $('#add_pegawai').click(function(){
                count_pegawai = count_pegawai + 1;
                var html_code_pegawai = "<tr id='baris"+count_pegawai+"'>";
                    html_code_pegawai+= "<td><input type='text' name='nip_usulan' class='form-control nip_usulan' id='nip_usulan"+count_pegawai+"' required></td>";
                    html_code_pegawai+= "<td><input type='text' name='nama_usulan' class='form-control nama_usulan' id='nama_usulan"+count_pegawai+"' readonly='readonly'></td>";
                    html_code_pegawai+= "<td><input type='text' name='jabatan_sekarang' class='form-control jabatan_sekarang' id='jabatan_skg"+count_pegawai+"' readonly='readonly'></td>";
                    html_code_pegawai+= "<td><select class='form-control business_area' name='business_area' id='add_area"+count_pegawai+"' required><option value=''>Pilih Salah Satu</option><?php foreach($area as $row):?><option value='<?php echo $row->business_area;?>'><?php echo $row->nama_business_area;?></option><?php endforeach;?></select></td>";
                    html_code_pegawai+= "<td><select class='form-control personnel_subarea' name='personnel_subarea' id='add_subarea"+count_pegawai+"' required><option value=''>Pilih Business Area dahulu</option></select></td>";
                    html_code_pegawai+= "<td><select class='form-control jabatan' name='jabatan' id='add_jabatan"+count_pegawai+"' required><option value=''>Pilih Personnel Subarea dahulu</option></select></td>";
                    html_code_pegawai+= "<td><button type='button' class='btn btn-danger remove_pegawai' name='remove_pegawai' data-baris='baris"+count_pegawai+"'><strong>-</strong></button></td>";
                    html_code_pegawai+= "</tr>";
                    $('#tbl_pegawai_usulan').append(html_code_pegawai);
  
                //Begin AutoFill
                    $('#nip_usulan'+count_pegawai).keyup(function(){
                        var nip = $('#nip_usulan'+count_pegawai).val();
                        $.ajax({
                            url : '<?= site_url('AdministratorInduk/autoFillUsulanPegawai'); ?>',
                            data : {'nip' : nip},
                            type : 'post',
                            async : true,
                            dataType : 'json',
                            success : function(data){
                                $.each(data, function(i, item){
                                    $('#nama_usulan'+count_pegawai).val(data[i].nama_pegawai).attr('title', data[i].nama_pegawai);
                                    $('#jabatan_skg'+count_pegawai).val(data[i].sebutan_jabatan).attr('title', data[i].sebutan_jabatan);
                                });
                            }
                        });
                    });      
                //End AutoFill

                //Begin chainDropdown Area
                    $('#add_area'+count_pegawai).change(function(){ 
                        var id=$(this).val();
                        $.ajax({
                            url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                            method : "POST",
                            data : {id: id},
                            async : true,
                            dataType : 'json',
                            success: function(data){
                                 
                                var html = '<option value="">Pilih Salah Satu</option>';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].personnel_subarea+'>'+data[i].nama_personnel_subarea+'</option>';
                                }
                                $('#add_subarea'+count_pegawai).html(html);
         
                            }
                        });
                        return false;
                    }); 

                    $('#add_subarea'+count_pegawai).change(function(){ 
                        var id=$(this).val();
                        $.ajax({
                            url : "<?= site_url('AdministratorInduk/getSebutanJabatan');?>",
                            method : "POST",
                            data : {id: id},
                            async : true,
                            dataType : 'json',
                            success: function(data){
                                 
                                var html = '<option value="">Pilih Salah Satu</option>';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].id_sebutan_jabatan+' title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                                }
                                $('#add_jabatan'+count_pegawai).html(html);
         
                            }
                        });
                        return false;
                    });
                //End chainDropdown Area
            });

            $(document).on('click', '.remove_pegawai',function(){
                var delete_baris = $(this).data("baris");
                $('#' + delete_baris).remove();
            });


            $('#add_approval').click(function(){
                count_approval = count_approval + 1;
                var html_code_approval = '<tr id="barisApproval'+count_approval+'">';
                    html_code_approval+= '<td><select class="form-control nama_usulan_approval" name="nama_usulan_approval" id="nama_usulan_approval" required><option value="">Pilih Salah Satu</option><?php foreach($approval as $row):?><option value="<?= $row->id_approval ?>">(<?= $row->nip ?>) <?= $row->nama_pegawai ?></option><?php endforeach?></select></td>';
                    html_code_approval+= '<td><select class="form-control posisi" name="posisi" id="posisi" required><option>Pilih Salah Satu</option><?php foreach ($posisi as $pos): ?><option value="<?= $pos->id_posisi ?>"><?= $pos->posisi ?></option><?php endforeach ?></select></td>';
                    html_code_approval+= "<td><button type='button' class='btn btn-danger remove_approval' name='remove_approval' data-barisapproval='barisApproval"+count_approval+"'><strong>-</strong></button></td>";
                    html_code_approval+= '</tr>';
                    $('#tbl_approval_usulan').append(html_code_approval);
            });

            $(document).on('click', '.remove_approval',function(){
                var delete_barisApproval = $(this).data("barisapproval");
                $('#' + delete_barisApproval).remove();
            }); 

            $('#tombol_tambah_data').click(function(){
                var nip_usulan = [];
                var jabatan = [];
                var nama_usulan_approval = [];
                var posisi = [];

                $('[name="nip_usulan"]').each(function(){
                    nip_usulan.push($(this).val());
                });
                $('[name="jabatan"]').each(function(){
                    jabatan.push($(this).find(":selected").val());
                });
                $('[name="nama_usulan_approval"]').each(function(){
                    nama_usulan_approval.push($(this).find(":selected").val());
                });
                $('[name="posisi"]').each(function(){
                    posisi.push($(this).find(":selected").val());
                });
                
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/doAddUsulan');?>",
                    method : "POST",
                    data : {nip_usulan:nip_usulan, jabatan:jabatan, nama_usulan_approval:nama_usulan_approval, posisi:posisi},
                    success : function(data){
                        window.location.href = "<?= site_url('AdministratorInduk/tampilanUsulanLembarEvaluasi');?>";
                    }
                });
            });    

        });
    </script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'AdministratorUnit' && $this->uri->segment(2) == 'tampilanAddUsulanLembarEvaluasi'): ?>
    <script>
        $(document).ready(function(){
            
            //Begin AutoFill
                $('#nip_usulan').keyup(function(){
                    var nip = $('#nip_usulan').val();
                    $.ajax({
                        url : '<?= site_url('AdministratorUnit/autoFillUsulanPegawai'); ?>',
                        data : {'nip' : nip},
                        type : 'post',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            $.each(data, function(i, item){
                                $('#nama_usulan').val(data[i].nama_pegawai).attr('title', data[i].nama_pegawai);
                                $('#jabatan_skg').val(data[i].sebutan_jabatan).attr('title', data[i].sebutan_jabatan);
                            });
                        }
                    });
                });      
            //End AutoFill

            var count_pegawai = 1;
            var count_approval = 1;

            $('#add_pegawai').click(function(){
                count_pegawai = count_pegawai + 1;
                var html_code_pegawai = "<tr id='baris"+count_pegawai+"'>";
                    html_code_pegawai+= "<td><input type='text' name='nip_usulan' class='form-control nip_usulan' id='nip_usulan"+count_pegawai+"' required></td>";
                    html_code_pegawai+= "<td><input type='text' name='nama_usulan' class='form-control nama_usulan' id='nama_usulan"+count_pegawai+"' readonly='readonly'></td>";
                    html_code_pegawai+= "<td><input type='text' name='jabatan_sekarang' class='form-control jabatan_sekarang' id='jabatan_skg"+count_pegawai+"' readonly='readonly'></td>";
                    html_code_pegawai+= "<td><select class='form-control business_area' name='business_area' id='add_area"+count_pegawai+"' required><option value=''>Pilih Salah Satu</option><?php foreach($area as $row):?><option value='<?php echo $row->business_area;?>'><?php echo $row->nama_business_area;?></option><?php endforeach;?></select></td>";
                    html_code_pegawai+= "<td><select class='form-control personnel_subarea' name='personnel_subarea' id='add_subarea"+count_pegawai+"' required><option value=''>Pilih Business Area dahulu</option></select></td>";
                    html_code_pegawai+= "<td><select class='form-control jabatan' name='jabatan' id='add_jabatan"+count_pegawai+"' required><option value=''>Pilih Personnel Subarea dahulu</option></select></td>";
                    html_code_pegawai+= "<td><button type='button' class='btn btn-danger remove_pegawai' name='remove_pegawai' data-baris='baris"+count_pegawai+"'><strong>-</strong></button></td>";
                    html_code_pegawai+= "</tr>";
                    $('#tbl_pegawai_usulan').append(html_code_pegawai);
  
                //Begin AutoFill
                    $('#nip_usulan'+count_pegawai).keyup(function(){
                        var nip = $('#nip_usulan'+count_pegawai).val();
                        $.ajax({
                            url : '<?= site_url('AdministratorUnit/autoFillUsulanPegawai'); ?>',
                            data : {'nip' : nip},
                            type : 'post',
                            async : true,
                            dataType : 'json',
                            success : function(data){
                                $.each(data, function(i, item){
                                    $('#nama_usulan'+count_pegawai).val(data[i].nama_pegawai).attr('title', data[i].nama_pegawai);
                                    $('#jabatan_skg'+count_pegawai).val(data[i].sebutan_jabatan).attr('title', data[i].sebutan_jabatan);
                                });
                            }
                        });
                    });      
                //End AutoFill

                //Begin chainDropdown Area
                    $('#add_area'+count_pegawai).change(function(){ 
                        var id=$(this).val();
                        $.ajax({
                            url : "<?= site_url('AdministratorUnit/getPersonnelSubarea');?>",
                            method : "POST",
                            data : {id: id},
                            async : true,
                            dataType : 'json',
                            success: function(data){
                                 
                                var html = '<option value="">Pilih Salah Satu</option>';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].personnel_subarea+'>'+data[i].nama_personnel_subarea+'</option>';
                                }
                                $('#add_subarea'+count_pegawai).html(html);
         
                            }
                        });
                        return false;
                    }); 

                    $('#add_subarea'+count_pegawai).change(function(){ 
                        var id=$(this).val();
                        $.ajax({
                            url : "<?= site_url('AdministratorUnit/getSebutanJabatan');?>",
                            method : "POST",
                            data : {id: id},
                            async : true,
                            dataType : 'json',
                            success: function(data){
                                 
                                var html = '<option value="">Pilih Salah Satu</option>';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].id_sebutan_jabatan+' title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                                }
                                $('#add_jabatan'+count_pegawai).html(html);
         
                            }
                        });
                        return false;
                    });
                //End chainDropdown Area
            });

            $(document).on('click', '.remove_pegawai',function(){
                var delete_baris = $(this).data("baris");
                $('#' + delete_baris).remove();
            });


            $('#add_approval').click(function(){
                count_approval = count_approval + 1;
                var html_code_approval = '<tr id="barisApproval'+count_approval+'">';
                    html_code_approval+= '<td><select class="form-control nama_usulan_approval" name="nama_usulan_approval" id="nama_usulan_approval" required><option value="">Pilih Salah Satu</option><?php foreach($approval as $row):?><option value="<?= $row->id_approval ?>">(<?= $row->nip ?>) <?= $row->nama_pegawai ?></option><?php endforeach?></select></td>';
                    html_code_approval+= '<td><select class="form-control posisi" name="posisi" id="posisi" required><option>Pilih Salah Satu</option><?php foreach ($posisi as $pos): ?><option value="<?= $pos->id_posisi ?>"><?= $pos->posisi ?></option><?php endforeach ?></select></td>';
                    html_code_approval+= "<td><button type='button' class='btn btn-danger remove_approval' name='remove_approval' data-barisapproval='barisApproval"+count_approval+"'><strong>-</strong></button></td>";
                    html_code_approval+= '</tr>';
                    $('#tbl_approval_usulan').append(html_code_approval);
            });

            $(document).on('click', '.remove_approval',function(){
                var delete_barisApproval = $(this).data("barisapproval");
                $('#' + delete_barisApproval).remove();
            }); 

            $('#tombol_tambah_data').click(function(){
                var nip_usulan = [];
                var jabatan = [];
                var nama_usulan_approval = [];
                var posisi = [];

                $('[name="nip_usulan"]').each(function(){
                    nip_usulan.push($(this).val());
                });
                $('[name="jabatan"]').each(function(){
                    jabatan.push($(this).find(":selected").val());
                });
                $('[name="nama_usulan_approval"]').each(function(){
                    nama_usulan_approval.push($(this).find(":selected").val());
                });
                $('[name="posisi"]').each(function(){
                    posisi.push($(this).find(":selected").val());
                });
                
                $.ajax({
                    url : "<?= site_url('AdministratorUnit/doAddUsulan');?>",
                    method : "POST",
                    data : {nip_usulan:nip_usulan, jabatan:jabatan, nama_usulan_approval:nama_usulan_approval, posisi:posisi},
                    success : function(data){
                        window.location.href = "<?= site_url('AdministratorUnit/tampilanUsulanLembarEvaluasi');?>";
                    }
                });
            });    

        });
    </script>
<?php endif ?>

</body>

</html>