<script src="<?php echo base_url();?>assets/backend/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> -->
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $("#calendar").datepicker('show');
    $.widget.bridge('uibutton', $.ui.button);
    $(document).ready(function() {
        $('.dat_tbl').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        //$("#editForm").validate();
        $('#editForm').submit(function(){
            if(tinymce.get('page_description').getContent()=='') {
                alert('Please Add Page Description');
                return false;
            }
        });
        $('#editForm').submit(function(){
            if(tinymce.get('description').getContent()=='') {
                alert('Please Add News Description');
                return false;
            }
        });
        $('#gallery_image').change(function(e){
            var fileName = e.target.files[0].name;
            $('#image_name1').html(fileName);
        });
        $('#frm').submit(function(){});
        $(".pagination a").click(function(){
            var url=$(this).attr('href');
            $("#frm").attr('action',url);
            $("#frm").submit();
            return false;
        });
        $('.enrollno').hide();
        $('.pddesignation').hide();
        $('.supervisor').hide();
        $('.cosupervisors').hide();
        $('.post').hide();
        $('.lab').hide();
        $('.mobile').hide();
        $('.office').hide();
        $('.specialization').hide();
        $('.research_keyword').hide();
        $('.project_name').hide();
        $('.ndesignation').hide();
        $('.admssnyear').hide();
        $('.program').hide();
        $('.department').hide();
        $('.institutename').hide();
        $('.profilelink').hide();
        $('.degree').hide();
        // For team page
        $('#position').change(function(){
            var selectedPosition = $(this).children("option:selected").val();
            if (selectedPosition == 1) {
                $('.enrollno').hide();
                $('.pddesignation').show();
                $('.supervisor').hide();
                $('.cosupervisors').hide();
                $('.post').hide();
                $('.lab').hide();
                $('.mobile').show();
                $('.office').hide();
                $('.specialization').show();
                $('.research_keyword').show();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            } else if (selectedPosition == 2) {
                $('.enrollno').hide();
                $('.pddesignation').show();
                $('.supervisor').show();
                $('.cosupervisors').show();
                $('.post').hide();
                $('.lab').hide();
                $('.mobile').show();
                $('.office').hide();
                $('.specialization').show();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            } else if (selectedPosition == 3) {
                $('.enrollno').show();
                $('.pddesignation').hide();
                $('.supervisor').show();
                $('.cosupervisors').show();
                $('.post').hide();
                $('.lab').hide();
                $('.mobile').hide();
                $('.office').hide();
                $('.specialization').show();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').show();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            } else if (selectedPosition == 4) {
                $('.enrollno').hide();
                $('.pddesignation').show();
                $('.supervisor').show();
                $('.cosupervisors').show();
                $('.post').hide();
                $('.lab').hide();
                $('.mobile').show();
                $('.office').hide();
                $('.specialization').show();
                $('.research_keyword').hide();
                $('.project_name').show();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            } else if (selectedPosition == 5) {
                $('.enrollno').show();
                $('.pddesignation').hide();
                $('.supervisor').hide();
                $('.cosupervisors').hide();
                $('.post').hide();
                $('.lab').hide();
                $('.mobile').hide();
                $('.office').hide();
                $('.specialization').hide();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').show();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').show();
            } else if (selectedPosition == 6) {
                $('.enrollno').hide();
                $('.pddesignation').hide();
                $('.supervisor').hide();
                $('.cosupervisors').hide();
                $('.post').show();
                $('.lab').show();
                $('.mobile').show();
                $('.office').hide();
                $('.specialization').hide();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            } else if (selectedPosition == 7) {
                $('.enrollno').hide();
                $('.pddesignation').hide();
                $('.supervisor').hide();
                $('.cosupervisors').hide();
                $('.post').show();
                $('.lab').show();
                $('.mobile').show();
                $('.office').show();
                $('.specialization').hide();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            } else if (selectedPosition == 8){
                $('.enrollno').hide();
                $('.pddesignation').hide();
                $('.supervisor').hide();
                $('.cosupervisors').hide();
                $('.post').show();
                $('.lab').hide();
                $('.mobile').hide();
                $('.office').hide();
                $('.specialization').hide();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').show();
                $('.institutename').show();
                $('.profilelink').show();
                $('.degree').hide();
            } else {
                $('.enrollno').hide();
                $('.pddesignation').hide();
                $('.supervisor').hide();
                $('.cosupervisors').hide();
                $('.post').hide();
                $('.lab').hide();
                $('.mobile').hide();
                $('.office').hide();
                $('.specialization').hide();
                $('.research_keyword').hide();
                $('.project_name').hide();
                $('.ndesignation').hide();
                $('.admssnyear').hide();
                $('.program').hide();
                $('.department').hide();
                $('.institutename').hide();
                $('.profilelink').hide();
                $('.degree').hide();
            }
        })
        
        if ($('#position').val() == 1) {
            $('.enrollno').hide();
            $('.pddesignation').show();
            $('.supervisor').hide();
            $('.cosupervisors').hide();
            $('.post').hide();
            $('.lab').hide();
            $('.mobile').show();
            $('.office').hide();
            $('.specialization').show();
            $('.research_keyword').show();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        } else if ($('#position').val() == 2) {
            $('.enrollno').hide();
            $('.pddesignation').show();
            $('.supervisor').show();
            $('.cosupervisors').show();
            $('.post').hide();
            $('.lab').hide();
            $('.mobile').show();
            $('.office').hide();
            $('.specialization').show();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        } else if ($('#position').val() == 3) {
            $('.enrollno').show();
            $('.pddesignation').hide();
            $('.supervisor').show();
            $('.cosupervisors').show();
            $('.post').hide();
            $('.lab').hide();
            $('.mobile').hide();
            $('.office').hide();
            $('.specialization').show();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').show();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        } else if ($('#position').val() == 4) {
            $('.enrollno').hide();
            $('.pddesignation').show();
            $('.supervisor').show();
            $('.cosupervisors').show();
            $('.post').hide();
            $('.lab').hide();
            $('.mobile').show();
            $('.office').hide();
            $('.specialization').show();
            $('.research_keyword').hide();
            $('.project_name').show();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        } else if ($('#position').val() == 5) {
            $('.enrollno').show();
            $('.pddesignation').hide();
            $('.supervisor').hide();
            $('.cosupervisors').hide();
            $('.post').hide();
            $('.lab').hide();
            $('.mobile').hide();
            $('.office').hide();
            $('.specialization').hide();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').show();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').show();
        } else if ($('#position').val() == 6) {
            $('.enrollno').hide();
            $('.pddesignation').hide();
            $('.supervisor').hide();
            $('.cosupervisors').hide();
            $('.post').show();
            $('.lab').show();
            $('.mobile').show();
            $('.office').hide();
            $('.specialization').hide();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        }  else if ($('#position').val() == 7) {
            $('.enrollno').hide();
            $('.pddesignation').hide();
            $('.supervisor').hide();
            $('.cosupervisors').hide();
            $('.post').show();
            $('.lab').show();
            $('.mobile').show();
            $('.office').show();
            $('.specialization').hide();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        } else if ($('#position').val() == 8)  {
            $('.enrollno').hide();
            $('.pddesignation').hide();
            $('.supervisor').hide();
            $('.cosupervisors').hide();
            $('.post').show();
            $('.lab').hide();
            $('.mobile').hide();
            $('.office').hide();
            $('.specialization').hide();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').show();
            $('.institutename').show();
            $('.profilelink').show();
            $('.degree').hide();
        }  else {
            $('.enrollno').hide();
            $('.pddesignation').hide();
            $('.supervisor').hide();
            $('.cosupervisors').hide();
            $('.post').hide();
            $('.lab').hide();
            $('.mobile').hide();
            $('.office').hide();
            $('.specialization').hide();
            $('.research_keyword').hide();
            $('.project_name').hide();
            $('.ndesignation').hide();
            $('.admssnyear').hide();
            $('.program').hide();
            $('.department').hide();
            $('.institutename').hide();
            $('.profilelink').hide();
            $('.degree').hide();
        }

        $("#position").change(function(){
            var position = $("#position").val();
            $.post(
                "<?php echo base_url('admin/ourteam/get_designation_list') ?>", {position: position}, 
                function(result){
                    if(result) {
                        $("#designation").html(result);
                        $("#program").html(result);
                        $("#degree").html(result); 
                    }
                }
            )
        });

        $('#degree').change(function(){
            var checkDegree = $(this).children("option:selected").text();
            if (checkDegree.includes("M") == true) {
                $('.specialization').show();
            } else {
                $('.specialization').hide();
            }
        })

        $('#supervisor').selectpicker('render');
        
        $(".allow_numeric").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
            evt.preventDefault();
            }
        });

        $(".allow_decimal").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });

        $('#typeofLab').change(function(){
            var typeofLab = $(this).children("option:selected").val();
            if (typeofLab == 1) {
                $('.lspecialization').show();
                $('.coordinator').show();
                $('.coCoordinators').show();
                $('.external_link').hide();
            } else {
                $('.lspecialization').hide();
                $('.coordinator').hide();
                $('.coCoordinators').hide();
                $('.external_link').show();
            }
        })
    });
    CKEDITOR.replace('description');
    CKEDITOR.replace('about_specialization');
    CKEDITOR.replace('research_specialization');
</script>
<style type="text/css">
    /*.tox-statusbar{display: none !important;}*/
</style>