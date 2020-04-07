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
            /* Populate data to subarea dropdown */
            $('#area').on('change',function(){
                var areaID = $(this).val();
                if(areaID) {
                    $.ajax({
                        type:'POST',
                        url:'<?php echo base_url('AdministratorInduk/getSubarea');?>',
                        data:'business_area='+areaID,
                        success:function(data){
                            $('#subarea').html('<option value="">Pilih Personnel Subarea</option>');
                            var dataObj = jQuery.parseJSON(data);
                            if(dataObj){
                                $(dataObj).each(function(){
                                    var option = $('<option />');
                                    option.attr('value', this.personnel_subarea).text(this.nama_personnel_subarea);
                                    $('#subarea').append(option);
                                });
                            }else{
                                $('#subarea').html('<option value="">Personel Subarea tidak tersedia</option>');
                            }
                        }
                    });
                }else{
                    $('#subarea').html('<option value="">Pilih Business Area dahulu</option>');
                }
            });

            $('#subarea').on('change',function(){
                var subareaID = $(this).val();
                if(subareaID) {
                    $.ajax({
                        type:'POST',
                        url:'<?php echo base_url('AdministratorInduk/getJabatan');?>',
                        data:'personnel_subarea='+subareaID,
                        success:function(data){
                            $('#jabatan').html('<option value="">Pilih Sebutan Jabatan</option>');
                            var dataObj = jQuery.parseJSON(data);
                            if(dataObj){
                                $(dataObj).each(function(){
                                    var option = $('<option />');
                                    option.attr('value', this.id_sebutan_jabatan).text(this.sebutan_jabatan);
                                    $('#jabatan').append(option);
                                });
                            }else{
                                $('#jabatan').html('<option value="">Sebutan Jabatan tidak tersedia</option>');
                            }
                        }
                    });
                }else{
                    $('#jabatan').html('<option value="">Pilih Personnel Area dahulu</option>');
                }
            });

            $('#area_update').on('change',function(){
                var areaID = $(this).val();
                if(areaID) {
                    $.ajax({
                        type:'POST',
                        url:'<?php echo base_url('AdministratorInduk/getSubarea');?>',
                        data:'business_area='+areaID,
                        success:function(data){
                            $('#subarea_update').html('<option value="">Pilih Personnel Subarea</option>');
                            var dataObj = jQuery.parseJSON(data);
                            if(dataObj){
                                $(dataObj).each(function(){
                                    var option = $('<option />');
                                    option.attr('value', this.personnel_subarea).text(this.nama_personnel_subarea);
                                    $('#subarea_update').append(option);
                                });
                            }else{
                                $('#subarea_update').html('<option value="">Personel Subarea tidak tersedia</option>');
                            }
                        }
                    });
                }else{
                    $('#subarea_update').html('<option value="">Pilih Business Area dahulu</option>');
                }
            });

            $('#subarea_update').on('change',function(){
                var subareaID = $(this).val();
                if(subareaID) {
                    $.ajax({
                        type:'POST',
                        url:'<?php echo base_url('AdministratorInduk/getJabatan');?>',
                        data:'personnel_subarea='+subareaID,
                        success:function(data){
                            $('#jabatan_update').html('<option value="">Pilih Sebutan Jabatan</option>');
                            var dataObj = jQuery.parseJSON(data);
                            if(dataObj){
                                $(dataObj).each(function(){
                                    var option = $('<option />');
                                    option.attr('value', this.id_sebutan_jabatan).text(this.sebutan_jabatan);
                                    $('#jabatan_update').append(option);
                                });
                            }else{
                                $('#jabatan_update').html('<option value="">Sebutan Jabatan tidak tersedia</option>');
                            }
                        }
                    });
                }else{
                    $('#jabatan_update').html('<option value="">Pilih Personnel Area dahulu</option>');
                }
            });
        });
    </script>

</body>

</html>