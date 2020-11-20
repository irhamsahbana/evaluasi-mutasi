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

        if($myURI == 'tampilanDataPegawai') {
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

            //Begin chainDropdown Area
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
                                html += '<option value="'+data[i].personnel_subarea+'">'+data[i].nama_personnel_subarea+'</option>';
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
                                html += '<option value="'+data[i].sebutan_jabatan+'" title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                            }
                            $('#add_jabatan').html(html);
     
                        }
                    });
                    return false;
                });         
            //End chainDropdown Area
            
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
                                $('#grade_skg').val(data[i].grade).attr('title', data[i].grade);
                                $('#tgl_grade_terakhir').val(data[i].tgl_grade).attr('title', data[i].tgl_grade);
                                $('#pendidikan_terakhir').val(data[i].pendidikan_terakhir).attr('title', data[i].pendidikan_terakhir);
                            });
                        }
                    });
                });

                $('#nip_usulan').keyup(function(){
                    var nip_talenta = $('#nip_usulan').val();
                    $.ajax({
                        url : '<?= site_url('AdministratorInduk/autoFillTalenta'); ?>',
                        data : {'nip_talenta' : nip_talenta},
                        type : 'post',
                        async : true,
                        dataType : 'json',
                        success : function(talenta){
                            $('#n_smstr_1_').val(talenta[2]['nilai_talenta']).attr('title', talenta[2]['tahun_talenta']+' Semester '+talenta[2]['semester_talenta']);
                            $('#n_smstr_2_').val(talenta[1]['nilai_talenta']).attr('title', talenta[1]['tahun_talenta']+' Semester '+talenta[1]['semester_talenta']);
                            $('#n_smstr_3_').val(talenta[0]['nilai_talenta']).attr('title', talenta[0]['tahun_talenta']+' Semester '+talenta[0]['semester_talenta']);
                        }
                    });
                });      
            //End AutoFill

            //Begin Hitung Lama Jabatan
                $('#tgl_mulai_jabatan_skg').change(function(){ 
                    var tgl=$(this).val();
                    $.ajax({
                        url : "<?= site_url('AdministratorInduk/calculateLamaMenjabat');?>",
                        method : "post",
                        data : {'tgl': tgl},
                        async : true,
                        dataType : 'json',
                        success: function(tgl){
                            $('#lama_jabatan').val(tgl.lama_menjabat)
                        }
                    });
                    return false;
                }); 
            //End Hitung Lama Jabatan


            var count_pegawai = 1;
            var count_approval = 1;

            $(document).on('click', '#add_pegawai', function(e){
                var empty_pegawai = $(".req_peg").filter(function(){return $.trim($(this).val()) == '';}).length;

                if (empty_pegawai > 0){
                    alert('Isi Terlebih dahulu Form Pegawai yang kosong sebelum menambahkan usulan pegawai baru!');
                    e.preventDefault();
                } else {
                    e.preventDefault();

                    count_pegawai = count_pegawai + 1;
                    var html_code_pegawai = "<tr id='baris"+count_pegawai+"'>";
                        html_code_pegawai+= "<td><input type='text' name='nip_usulan' class='required form-control nip_usulan req_peg' id='nip_usulan"+count_pegawai+"' required='required'></td>";
                        html_code_pegawai+= "<td><input type='text' name='nama_usulan' class='form-control nama_usulan req_peg' id='nama_usulan"+count_pegawai+"' readonly='readonly'></td>";
                        html_code_pegawai+= "<td><input type='text' name='jabatan_skg' class='form-control jabatan_sekarang req_peg' id='jabatan_skg"+count_pegawai+"' readonly='readonly'></td>";
                        html_code_pegawai+= 
                                            `
                                                <td>
                                                    <input type="text" name="grade_skg" class="required form-control req_peg" id="grade_skg`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                <td>
                                                    <input type="text" name="tgl_grade_terakhir" class="required form-control req_peg" id="tgl_grade_terakhir`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                <td>
                                                    <input type="text" name="pendidikan_terakhir" class="required form-control req_peg" id="pendidikan_terakhir`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                 <td>
                                                    <input type="text" name="n_smstr_1_" class="required form-control req_peg" id="n_smstr_1_`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                 <td>
                                                    <input type="text" name="n_smstr_2_" class="required form-control req_peg" id="n_smstr_2_`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                 <td>
                                                    <input type="text" name="n_smstr_3_" class="required form-control req_peg" id="n_smstr_3_`+count_pegawai+`" readonly="readonly">
                                                </td>
                                            `;
                        html_code_pegawai+= "<td><input type='date' name='tgl_mulai_jabatan_skg' class='required form-control tgl_mulai_jabatan_skg req_peg' id='tgl_mulai_jabatan_skg"+count_pegawai+"'></td>";
                        html_code_pegawai+= 
                                            `
                                                <td>
                                                    <input type="text" name="lama_jabatan" class="required form-control req_peg" id="lama_jabatan`+count_pegawai+`" readonly="readonly">
                                                </td>
                                            `;
                        html_code_pegawai+= "<td><select class='required form-control business_area req_peg' name='business_area' id='add_area"+count_pegawai+"' required='required'><option value=''>Pilih Salah Satu</option><?php foreach($area as $row):?><option value='<?php echo $row->business_area;?>'><?php echo $row->nama_business_area;?></option><?php endforeach;?></select></td>";
                        html_code_pegawai+= "<td><select class='required form-control personnel_subarea req_peg' name='personnel_subarea' id='add_subarea"+count_pegawai+"' required='required'><option value=''>Pilih Business Area dahulu</option></select></td>";
                        html_code_pegawai+= "<td><select class='required form-control jabatan req_peg' name='jabatan' id='add_jabatan"+count_pegawai+"' required='required'><option value=''>Pilih Personnel Subarea dahulu</option></select></td>";
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
                                        $('#grade_skg'+count_pegawai).val(data[i].grade).attr('title', data[i].grade);
                                        $('#tgl_grade_terakhir'+count_pegawai).val(data[i].tgl_grade).attr('title', data[i].tgl_grade);
                                        $('#pendidikan_terakhir'+count_pegawai).val(data[i].pendidikan_terakhir).attr('title', data[i].pendidikan_terakhir);
                                    });
                                }
                            });
                        });

                        $('#nip_usulan'+count_pegawai).keyup(function(){
                            var nip_talenta = $('#nip_usulan'+count_pegawai).val();
                            $.ajax({
                                url : '<?= site_url('AdministratorInduk/autoFillTalenta'); ?>',
                                data : {'nip_talenta' : nip_talenta},
                                type : 'post',
                                async : true,
                                dataType : 'json',
                                success : function(talenta){
                                    $('#n_smstr_1_'+count_pegawai).val(talenta[2]['nilai_talenta']).attr('title', talenta[2]['tahun_talenta']+' Semester '+talenta[2]['semester_talenta']);
                                    $('#n_smstr_2_'+count_pegawai).val(talenta[1]['nilai_talenta']).attr('title', talenta[1]['tahun_talenta']+' Semester '+talenta[1]['semester_talenta']);
                                    $('#n_smstr_3_'+count_pegawai).val(talenta[0]['nilai_talenta']).attr('title', talenta[0]['tahun_talenta']+' Semester '+talenta[0]['semester_talenta']);
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
                                        html += '<option value="'+data[i].personnel_subarea+'">'+data[i].nama_personnel_subarea+'</option>';
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
                                        html += '<option value="'+data[i].sebutan_jabatan+'" title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                                    }
                                    $('#add_jabatan'+count_pegawai).html(html);
             
                                }
                            });
                            return false;
                        });
                    //End chainDropdown Area

                    //Begin Hitung Lama Jabatan
                        $('#tgl_mulai_jabatan_skg'+count_pegawai).change(function(){ 
                            var tgl=$(this).val();
                            $.ajax({
                                url : "<?= site_url('AdministratorInduk/calculateLamaMenjabat');?>",
                                method : "post",
                                data : {'tgl': tgl},
                                async : true,
                                dataType : 'json',
                                success: function(tgl){
                                    $('#lama_jabatan'+count_pegawai).val(tgl.lama_menjabat)
                                }
                            });
                            return false;
                        }); 
                    //End Hitung Lama Jabatan
                }
            });

            $(document).on('click', '.remove_pegawai',function(){
                var delete_baris = $(this).data("baris");
                $('#' + delete_baris).remove();
            });


            $('#add_approval').click(function(){
                count_approval = count_approval + 1;
                var html_code_approval = '<tr id="barisApproval'+count_approval+'">';
                    html_code_approval+= '<td><select class="required form-control nama_usulan_approval" name="nama_usulan_approval" id="nama_usulan_approval" required="required"><option value="">Pilih Salah Satu</option><?php foreach($approval as $row):?><option value="<?= $row->id_approval ?>">(<?= $row->nip ?>) <?= $row->nama_pegawai ?></option><?php endforeach?></select></td>';
                    html_code_approval+= '<td><select class="required form-control posisi" name="posisi" id="posisi" required="required"><option>Pilih Salah Satu</option><?php foreach ($posisi as $pos): ?><option value="<?= $pos->id_posisi ?>"><?= $pos->posisi ?></option><?php endforeach ?></select></td>';
                    html_code_approval+= "<td><button type='button' class='btn btn-danger remove_approval' name='remove_approval' data-barisapproval='barisApproval"+count_approval+"'><strong>-</strong></button></td>";
                    html_code_approval+= '</tr>';
                    $('#tbl_approval_usulan').append(html_code_approval);
            });

            $(document).on('click', '.remove_approval',function(){
                var delete_barisApproval = $(this).data("barisapproval");
                $('#' + delete_barisApproval).remove();
            }); 

            $(document).on('submit', '#target', function(e){

                var empty_field = $(".required").filter(function(){return $.trim($(this).val()) == '';}).length;
    
                if (empty_field > 0){
                    alert('Isi semua field terlebih dahulu!');
                    e.preventDefault();
                } else {
                    e.preventDefault();
                    var nip_usulan = [];
                    var nama = [];
                    var sebutan_jabatan_skg = [];
                    var sebutan_jabatan_usulan = [];
                    var grade_skg = [];
                    var tgl_grade_terakhir = [];
                    var pendidikan_terakhir = [];
                    var n_talenta_1 = [];
                    var n_talenta_2 = [];
                    var n_talenta_3 = [];
                    var lama_jabatan_terakhir = [];
                    var jabatan_usulan = [];

                    //header nilai talenta
                    var thn_1 = $('[name="thn_1"]').val();
                    var thn_2 = $('[name="thn_2"]').val();
                    var thn_3 = $('[name="thn_3"]').val();
                    var smstr_1 = $('[name="smstr_1"]').val();
                    var smstr_2 = $('[name="smstr_2"]').val();
                    var smstr_3 = $('[name="smstr_3"]').val();

                    var tim_approval = $('[name="tim_approval"]').val();

                    var id_approval = [];
                    var posisi = [];

                    //Pegawai yang Diusulkan
                    $('[name="nip_usulan"]').each(function(){
                        nip_usulan.push($(this).val());
                    });
                    $('[name="nama_usulan"]').each(function(){
                        nama.push($(this).val());
                    });
                    $('[name="jabatan_skg"]').each(function(){
                        sebutan_jabatan_skg.push($(this).val());
                    });
                    $('[name="grade_skg"]').each(function(){
                        grade_skg.push($(this).val());
                    });
                    $('[name="tgl_grade_terakhir"]').each(function(){
                        tgl_grade_terakhir.push($(this).val());
                    });
                    $('[name="pendidikan_terakhir"]').each(function(){
                        pendidikan_terakhir.push($(this).val());
                    });
                    $('[name="n_smstr_1_"]').each(function(){
                        n_talenta_1.push($(this).val());
                    });
                    $('[name="n_smstr_2_"]').each(function(){
                        n_talenta_2.push($(this).val());
                    });
                    $('[name="n_smstr_3_"]').each(function(){
                        n_talenta_3.push($(this).val());
                    });
                    $('[name="lama_jabatan"]').each(function(){
                        lama_jabatan_terakhir.push($(this).val());
                    });
                    $('[name="jabatan"]').each(function(){
                        jabatan_usulan.push($(this).find(":selected").val());
                    });

                    //Approval Committee
                    $('[name="nama_usulan_approval"]').each(function(){
                        id_approval.push($(this).find(":selected").val());
                    });
                    $('[name="posisi"]').each(function(){
                        posisi.push($(this).find(":selected").val());
                    });
                    
                    $.ajax({
                        url : "<?= site_url('AdministratorInduk/doAddUsulanMutasi');?>",
                        method : "POST",
                        data : {
                                    thn_1 : thn_1,
                                    thn_2 : thn_2,
                                    thn_3 : thn_3,
                                    smstr_1 : smstr_1,
                                    smstr_2 : smstr_2,
                                    smstr_3 : smstr_3,
                                    nip_usulan : nip_usulan,
                                    nama_usulan : nama,
                                    jabatan_skg : sebutan_jabatan_skg,
                                    grade_skg : grade_skg,
                                    tgl_grade_skg : tgl_grade_terakhir,
                                    pendidikan_terakhir : pendidikan_terakhir,
                                    n_talenta_1 : n_talenta_1,
                                    n_talenta_2 : n_talenta_2,
                                    n_talenta_3 : n_talenta_3,
                                    lama_jabatan_skg : lama_jabatan_terakhir,
                                    jabatan_usulan : jabatan_usulan,
                                    tim_approval : tim_approval, 
                                    id_approval : id_approval,
                                    posisi : posisi
                                },
                        success : function(data){
                            window.location.href = "<?= site_url('AdministratorInduk/tampilanUsulanLembarEvaluasi') ?>";
                            
                        },
                        error: function(jqxhr, status, exception) {
                            alert('Terjadi Kesalahan Sistem, Cek kembali data yang anda kirim!)');
                        }
                    })
                }
            });    

        });
    </script>
<?php endif ?>

<?php if ($this->uri->segment(1) == 'AdministratorUnit' && $this->uri->segment(2) == 'tampilanAddUsulanLembarEvaluasi'): ?>
    <script>
        $(document).ready(function(){

            //Begin chainDropdown Area
                $('#add_area').change(function(){ 
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
                                html += '<option value="'+data[i].personnel_subarea+'">'+data[i].nama_personnel_subarea+'</option>';
                            }
                            $('#add_subarea').html(html);
     
                        }
                    });
                    return false;
                }); 

                $('#add_subarea').change(function(){ 
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
                                html += '<option value="'+data[i].sebutan_jabatan+'" title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                            }
                            $('#add_jabatan').html(html);
     
                        }
                    });
                    return false;
                });         
            //End chainDropdown Area
            
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
                                $('#grade_skg').val(data[i].grade).attr('title', data[i].grade);
                                $('#tgl_grade_terakhir').val(data[i].tgl_grade).attr('title', data[i].tgl_grade);
                                $('#pendidikan_terakhir').val(data[i].pendidikan_terakhir).attr('title', data[i].pendidikan_terakhir);
                            });
                        }
                    });
                });

                $('#nip_usulan').keyup(function(){
                    var nip_talenta = $('#nip_usulan').val();
                    $.ajax({
                        url : '<?= site_url('AdministratorUnit/autoFillTalenta'); ?>',
                        data : {'nip_talenta' : nip_talenta},
                        type : 'post',
                        async : true,
                        dataType : 'json',
                        success : function(talenta){
                            $('#n_smstr_1_').val(talenta[2]['nilai_talenta']).attr('title', talenta[2]['tahun_talenta']+' Semester '+talenta[2]['semester_talenta']);
                            $('#n_smstr_2_').val(talenta[1]['nilai_talenta']).attr('title', talenta[1]['tahun_talenta']+' Semester '+talenta[1]['semester_talenta']);
                            $('#n_smstr_3_').val(talenta[0]['nilai_talenta']).attr('title', talenta[0]['tahun_talenta']+' Semester '+talenta[0]['semester_talenta']);
                        }
                    });
                });      
            //End AutoFill

            //Begin Hitung Lama Jabatan
                $('#tgl_mulai_jabatan_skg').change(function(){ 
                    var tgl=$(this).val();
                    $.ajax({
                        url : "<?= site_url('AdministratorUnit/calculateLamaMenjabat');?>",
                        method : "post",
                        data : {'tgl': tgl},
                        async : true,
                        dataType : 'json',
                        success: function(tgl){
                            $('#lama_jabatan').val(tgl.lama_menjabat)
                        }
                    });
                    return false;
                }); 
            //End Hitung Lama Jabatan


            var count_pegawai = 1;
            var count_approval = 1;

            $(document).on('click', '#add_pegawai', function(e){
                var empty_pegawai = $(".req_peg").filter(function(){return $.trim($(this).val()) == '';}).length;

                if (empty_pegawai > 0){
                    alert('Isi Terlebih dahulu Form Pegawai yang kosong sebelum menambahkan usulan pegawai baru!');
                    e.preventDefault();
                } else {
                    e.preventDefault();

                    count_pegawai = count_pegawai + 1;
                    var html_code_pegawai = "<tr id='baris"+count_pegawai+"'>";
                        html_code_pegawai+= "<td><input type='text' name='nip_usulan' class='required form-control nip_usulan req_peg' id='nip_usulan"+count_pegawai+"' required='required'></td>";
                        html_code_pegawai+= "<td><input type='text' name='nama_usulan' class='form-control nama_usulan req_peg' id='nama_usulan"+count_pegawai+"' readonly='readonly'></td>";
                        html_code_pegawai+= "<td><input type='text' name='jabatan_skg' class='form-control jabatan_sekarang req_peg' id='jabatan_skg"+count_pegawai+"' readonly='readonly'></td>";
                        html_code_pegawai+= 
                                            `
                                                <td>
                                                    <input type="text" name="grade_skg" class="required form-control req_peg" id="grade_skg`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                <td>
                                                    <input type="text" name="tgl_grade_terakhir" class="required form-control req_peg" id="tgl_grade_terakhir`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                <td>
                                                    <input type="text" name="pendidikan_terakhir" class="required form-control req_peg" id="pendidikan_terakhir`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                 <td>
                                                    <input type="text" name="n_smstr_1_" class="required form-control req_peg" id="n_smstr_1_`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                 <td>
                                                    <input type="text" name="n_smstr_2_" class="required form-control req_peg" id="n_smstr_2_`+count_pegawai+`" readonly="readonly">
                                                </td>
                                                 <td>
                                                    <input type="text" name="n_smstr_3_" class="required form-control req_peg" id="n_smstr_3_`+count_pegawai+`" readonly="readonly">
                                                </td>
                                            `;
                        html_code_pegawai+= "<td><input type='date' name='tgl_mulai_jabatan_skg' class='required form-control tgl_mulai_jabatan_skg req_peg' id='tgl_mulai_jabatan_skg"+count_pegawai+"'></td>";
                        html_code_pegawai+= 
                                            `
                                                <td>
                                                    <input type="text" name="lama_jabatan" class="required form-control req_peg" id="lama_jabatan`+count_pegawai+`" readonly="readonly">
                                                </td>
                                            `;
                        html_code_pegawai+= "<td><select class='required form-control business_area req_peg' name='business_area' id='add_area"+count_pegawai+"' required='required'><option value=''>Pilih Salah Satu</option><?php foreach($area as $row):?><option value='<?php echo $row->business_area;?>'><?php echo $row->nama_business_area;?></option><?php endforeach;?></select></td>";
                        html_code_pegawai+= "<td><select class='required form-control personnel_subarea req_peg' name='personnel_subarea' id='add_subarea"+count_pegawai+"' required='required'><option value=''>Pilih Business Area dahulu</option></select></td>";
                        html_code_pegawai+= "<td><select class='required form-control jabatan req_peg' name='jabatan' id='add_jabatan"+count_pegawai+"' required='required'><option value=''>Pilih Personnel Subarea dahulu</option></select></td>";
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
                                        $('#grade_skg'+count_pegawai).val(data[i].grade).attr('title', data[i].grade);
                                        $('#tgl_grade_terakhir'+count_pegawai).val(data[i].tgl_grade).attr('title', data[i].tgl_grade);
                                        $('#pendidikan_terakhir'+count_pegawai).val(data[i].pendidikan_terakhir).attr('title', data[i].pendidikan_terakhir);
                                    });
                                }
                            });
                        });

                        $('#nip_usulan'+count_pegawai).keyup(function(){
                            var nip_talenta = $('#nip_usulan'+count_pegawai).val();
                            $.ajax({
                                url : '<?= site_url('AdministratorUnit/autoFillTalenta'); ?>',
                                data : {'nip_talenta' : nip_talenta},
                                type : 'post',
                                async : true,
                                dataType : 'json',
                                success : function(talenta){
                                    $('#n_smstr_1_'+count_pegawai).val(talenta[2]['nilai_talenta']).attr('title', talenta[2]['tahun_talenta']+' Semester '+talenta[2]['semester_talenta']);
                                    $('#n_smstr_2_'+count_pegawai).val(talenta[1]['nilai_talenta']).attr('title', talenta[1]['tahun_talenta']+' Semester '+talenta[1]['semester_talenta']);
                                    $('#n_smstr_3_'+count_pegawai).val(talenta[0]['nilai_talenta']).attr('title', talenta[0]['tahun_talenta']+' Semester '+talenta[0]['semester_talenta']);
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
                                        html += '<option value="'+data[i].personnel_subarea+'">'+data[i].nama_personnel_subarea+'</option>';
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
                                        html += '<option value="'+data[i].sebutan_jabatan+'" title="'+data[i].sebutan_jabatan+'">'+data[i].sebutan_jabatan+'</option>';
                                    }
                                    $('#add_jabatan'+count_pegawai).html(html);
             
                                }
                            });
                            return false;
                        });
                    //End chainDropdown Area

                    //Begin Hitung Lama Jabatan
                        $('#tgl_mulai_jabatan_skg'+count_pegawai).change(function(){ 
                            var tgl=$(this).val();
                            $.ajax({
                                url : "<?= site_url('AdministratorUnit/calculateLamaMenjabat');?>",
                                method : "post",
                                data : {'tgl': tgl},
                                async : true,
                                dataType : 'json',
                                success: function(tgl){
                                    $('#lama_jabatan'+count_pegawai).val(tgl.lama_menjabat)
                                }
                            });
                            return false;
                        }); 
                    //End Hitung Lama Jabatan
                }
            });

            $(document).on('click', '.remove_pegawai',function(){
                var delete_baris = $(this).data("baris");
                $('#' + delete_baris).remove();
            });


            $('#add_approval').click(function(){
                count_approval = count_approval + 1;
                var html_code_approval = '<tr id="barisApproval'+count_approval+'">';
                    html_code_approval+= '<td><select class="required form-control nama_usulan_approval" name="nama_usulan_approval" id="nama_usulan_approval" required="required"><option value="">Pilih Salah Satu</option><?php foreach($approval as $row):?><option value="<?= $row->id_approval ?>">(<?= $row->nip ?>) <?= $row->nama_pegawai ?></option><?php endforeach?></select></td>';
                    html_code_approval+= '<td><select class="required form-control posisi" name="posisi" id="posisi" required="required"><option>Pilih Salah Satu</option><?php foreach ($posisi as $pos): ?><option value="<?= $pos->id_posisi ?>"><?= $pos->posisi ?></option><?php endforeach ?></select></td>';
                    html_code_approval+= "<td><button type='button' class='btn btn-danger remove_approval' name='remove_approval' data-barisapproval='barisApproval"+count_approval+"'><strong>-</strong></button></td>";
                    html_code_approval+= '</tr>';
                    $('#tbl_approval_usulan').append(html_code_approval);
            });

            $(document).on('click', '.remove_approval',function(){
                var delete_barisApproval = $(this).data("barisapproval");
                $('#' + delete_barisApproval).remove();
            }); 

            $(document).on('submit', '#target', function(e){

                var empty_field = $(".required").filter(function(){return $.trim($(this).val()) == '';}).length;
    
                if (empty_field > 0){
                    alert('Isi semua field terlebih dahulu!');
                    e.preventDefault();
                } else {
                    e.preventDefault();
                    var nip_usulan = [];
                    var nama = [];
                    var sebutan_jabatan_skg = [];
                    var sebutan_jabatan_usulan = [];
                    var grade_skg = [];
                    var tgl_grade_terakhir = [];
                    var pendidikan_terakhir = [];
                    var n_talenta_1 = [];
                    var n_talenta_2 = [];
                    var n_talenta_3 = [];
                    var lama_jabatan_terakhir = [];
                    var jabatan_usulan = [];

                    //header nilai talenta
                    var thn_1 = $('[name="thn_1"]').val();
                    var thn_2 = $('[name="thn_2"]').val();
                    var thn_3 = $('[name="thn_3"]').val();
                    var smstr_1 = $('[name="smstr_1"]').val();
                    var smstr_2 = $('[name="smstr_2"]').val();
                    var smstr_3 = $('[name="smstr_3"]').val();

                    var tim_approval = $('[name="tim_approval"]').val();

                    var id_approval = [];
                    var posisi = [];

                    //Pegawai yang Diusulkan
                    $('[name="nip_usulan"]').each(function(){
                        nip_usulan.push($(this).val());
                    });
                    $('[name="nama_usulan"]').each(function(){
                        nama.push($(this).val());
                    });
                    $('[name="jabatan_skg"]').each(function(){
                        sebutan_jabatan_skg.push($(this).val());
                    });
                    $('[name="grade_skg"]').each(function(){
                        grade_skg.push($(this).val());
                    });
                    $('[name="tgl_grade_terakhir"]').each(function(){
                        tgl_grade_terakhir.push($(this).val());
                    });
                    $('[name="pendidikan_terakhir"]').each(function(){
                        pendidikan_terakhir.push($(this).val());
                    });
                    $('[name="n_smstr_1_"]').each(function(){
                        n_talenta_1.push($(this).val());
                    });
                    $('[name="n_smstr_2_"]').each(function(){
                        n_talenta_2.push($(this).val());
                    });
                    $('[name="n_smstr_3_"]').each(function(){
                        n_talenta_3.push($(this).val());
                    });
                    $('[name="lama_jabatan"]').each(function(){
                        lama_jabatan_terakhir.push($(this).val());
                    });
                    $('[name="jabatan"]').each(function(){
                        jabatan_usulan.push($(this).find(":selected").val());
                    });

                    //Approval Committee
                    $('[name="nama_usulan_approval"]').each(function(){
                        id_approval.push($(this).find(":selected").val());
                    });
                    $('[name="posisi"]').each(function(){
                        posisi.push($(this).find(":selected").val());
                    });
                    
                    $.ajax({
                        url : "<?= site_url('AdministratorUnit/doAddUsulanMutasi');?>",
                        method : "POST",
                        data : {
                                    thn_1 : thn_1,
                                    thn_2 : thn_2,
                                    thn_3 : thn_3,
                                    smstr_1 : smstr_1,
                                    smstr_2 : smstr_2,
                                    smstr_3 : smstr_3,
                                    nip_usulan : nip_usulan,
                                    nama_usulan : nama,
                                    jabatan_skg : sebutan_jabatan_skg,
                                    grade_skg : grade_skg,
                                    tgl_grade_skg : tgl_grade_terakhir,
                                    pendidikan_terakhir : pendidikan_terakhir,
                                    n_talenta_1 : n_talenta_1,
                                    n_talenta_2 : n_talenta_2,
                                    n_talenta_3 : n_talenta_3,
                                    lama_jabatan_skg : lama_jabatan_terakhir,
                                    jabatan_usulan : jabatan_usulan,
                                    tim_approval : tim_approval, 
                                    id_approval : id_approval,
                                    posisi : posisi
                                },
                        success : function(data){
                            window.location.href = "<?= site_url('AdministratorUnit/tampilanUsulanLembarEvaluasi') ?>";
                            
                        },
                        error: function(jqxhr, status, exception) {
                            alert('Terjadi Kesalahan Sistem, Cek kembali data yang anda kirim!)');
                        }
                    })
                }
            });    

        });
    </script>
<?php endif ?>

</body>

</html>