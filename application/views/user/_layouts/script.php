    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/admin/'); ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>js/styleSwitcher.js"></script>
    <!-- script table -->
    <script src="<?= base_url('assets/admin/'); ?>plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/'); ?>plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        });
    </script>

</body>

</html>