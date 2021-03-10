  <script src="<?php echo base_url() ?>assets/vendor/bundles/libscripts.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bundles/vendorscripts.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bundles/mainscripts.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bundles/c3.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/index.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/parsleyjs/js/parsley.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/dropify/js/dropify.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/forms/dropify.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bundles/datatablescripts.bundle.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/tables/jquery-datatable.js"></script>
  <!-- include summernote css/js -->
  <link href="<?php echo base_url() ?>assets/vendor/summernote/dist/summernote.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/vendor/summernote/dist/summernote.js"></script>

  <script src="<?php echo base_url() ?>assets/vendor/sweetalert2.min.js"></script>

  <link href="<?php echo base_url() ?>assets/vendor/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url() ?>assets/vendor/select2.min.js"></script>

  <script>
      $(function() {
          let searchParams = new URLSearchParams(window.location.search);

          if (searchParams.has('func')) {
              $('#form-hidden').show();
          } else {
              $('#form-hidden').hide();
          }
          $('#basic-form').parsley();
          $('#btntambah').on('click', function(e) {
              e.preventDefault();
              $('#form-hidden').show('slow');
          });

          $('#cariatasan').select2({
              width: '100%',
              minimumInputLength: 3,
              ajax: {
                  type: "GET",
                  dataType: "json",
                  cache: false,
                  url: '<?= base_url() ?>hrd/cariatasan',
                  data: function(params) {
                      var query = {
                          param: params.term.replace(/ /g, " "),
                      }
                      return query;
                  },
                  processResults: function(data) {
                      return {
                          results: $.map(data, function(item) {
                              return {
                                  text: `${item.nama_karyawan} | ${item.jabatan}`,
                                  id: item.nama_karyawan
                              }
                          })
                      };
                  }
              }
          });
          $('#cariemail').select2({
              width: '100%',
              minimumInputLength: 2,
              ajax: {
                  type: "GET",
                  dataType: "json",
                  cache: false,
                  url: '<?= base_url() ?>hrd/cariemail',
                  data: function(params) {
                      var query = {
                          param: params.term.replace(/ /g, " "),
                      }
                      return query;
                  },
                  processResults: function(data) {
                      return {
                          results: $.map(data, function(item) {
                              return {
                                  text: `${item.email}`,
                                  id: item.id_auth
                              }
                          })
                      };
                  }
              }
          });
          $('#carikaryawan').select2({
              width: '100%',
              minimumInputLength: 3,
              ajax: {
                  type: "GET",
                  dataType: "json",
                  cache: false,
                  url: '<?= base_url() ?>hrd/cariatasan',
                  data: function(params) {
                      var query = {
                          param: params.term.replace(/ /g, " "),
                      }
                      return query;
                  },
                  processResults: function(data) {
                      return {
                          results: $.map(data, function(item) {
                              return {
                                  text: `${item.nama_karyawan} | ${item.jabatan}`,
                                  id: item.id_karyawan
                              }
                          })
                      };
                  }
              }
          });

          $('#summernote').summernote({
              tabsize: 2,
              height: 230
          });


      });
  </script>
  </body>

  </html>