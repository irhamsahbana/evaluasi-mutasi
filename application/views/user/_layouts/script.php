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
            getDataEditAdmin();
            //load data for edit
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
                            $('[name="password"]').val(data[i].password);
                            $('[name="status"]').val(data[i].role);
                            $('[name="business_area"]').val(data[i].business_area).trigger('change');
                            $('[name="personnel_subarea"]').val(data[i].personnel_subarea).trigger('change');
                        });
                        console.log(`Request passed!`);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(`Request failed!`);
                    }
 
                });
            }

            $('.area-edit').change(function(){ 
                var id=$(this).val();
                var personnel_subarea = $('[subarea_id]').val();
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

            $('#area_admin').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?= site_url('AdministratorInduk/getPersonnelSubarea');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].personnel_subarea+'>'+data[i].nama_personnel_subarea+'</option>';
                        }
                        $('#subarea_admin').html(html);
 
                    }
                });
                return false;
            }); 

            
            
        });
    </script>

</body>

</html>