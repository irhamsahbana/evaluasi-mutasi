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
                            html += '<option value='+data[i].id_sebutan_jabatan+'>'+data[i].sebutan_jabatan+'</option>';
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
                                $('select[name="sebutan_jabatan"]').append('<option value="'+ value.id_sebutan_jabatan +'">'+ value.sebutan_jabatan +'</option>');
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

        <?php if($myURI == 'tampilanAdministrator') { ?>

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
                            $('[name="subarea"]').val(data[i].personnel_subarea);
                        });
                    }

                });
            }

        <?php } ?>

        });
    </script>

</body>

</html>