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

          $('#summernote').summernote({
              //   toolbar: [
              //       ['style', ['bold', 'italic', 'underline', 'clear']],
              //       ['font', ['strikethrough', 'superscript', 'subscript']],
              //       ['fontsize', ['fontsize']],
              //       ['color', ['color']],
              //       ['para', ['ul', 'ol', 'paragraph']],
              //       ['height', ['height']],
              //   ],
              //   placeholder: 'Kualifikasi Loker',
              tabsize: 2,
              height: 230
          });

          $('#btnvalidate').click(function() {
              const id = $(this).data("id");
              Swal.fire({
                  title: 'Are you sure?',
                  text: "Validasi Pelamar",
                  icon: 'warning',
                  input: 'radio',
                  inputOptions: {
                      'lulus': 'Lulus',
                      'tidak_lulus': 'Tidak Lulus'
                  },
                  inputValidator: (value) => {
                      if (!value) {
                          return 'You need to choose something!'
                      }
                  },
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Validate'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $.post(`<?= base_url() ?>admin/validasi_viaajax`, {
                          id_submit: id,
                          status: result.value
                      }, function(data, status) {
                          Swal.fire({
                              text: "Berhasil tervalidate",
                              icon: 'success',
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                          })
                          $('#btnvalidate').hide();
                      })
                  }
              })
          })
          $("#nextdata").on('click', function() {
              let j = $("input[name='jawaban']:checked").val()
              let soal = $("#idsoal").val()
              let kategori = $("#idkategori").val();
              $.ajax({
                  method: 'POST',
                  url: '<?= base_url() ?>mulaites/create_jawaban',
                  cache: false,
                  dataType: 'json',
                  data: {
                      kategori_soal: kategori,
                      id_soal: soal,
                      jawaban: j
                  },
                  success: function(data) {

                  },
                  error: function(error) {
                      console.log(error);
                  }
              })

          })
          $("#editnextdata").on('click', function() {
              let j = $("input[name='jawaban']:checked").val()
              let idjwb = $("#idjwb").val()
              $.ajax({
                  method: 'POST',
                  url: '<?= base_url() ?>mulaites/update_jawaban',
                  cache: false,
                  dataType: 'json',
                  data: {
                      id_jawaban: idjwb,
                      jawaban: j
                  },
                  success: function(data) {

                  },
                  error: function(error) {
                      console.log(error);
                  }
              })

          })

          $('#soalinterview').on('show.bs.modal', function(e) {
              let id_interview = $(e.relatedTarget).data('id-interview');
              $.ajax({
                  type: "post",
                  url: "<?= base_url('/admin/getexistinterview') ?>",
                  cache: false,
                  dataType: "json",
                  data: {
                      id_interview
                  },
                  success: function(data) {
                      $('div').remove('#detailjawaban')
                      if (data != null) {
                          $("#form-jawaban-interview").hide()
                          $("#btnsimpanjwb").hide()
                          data.map((item, index) => {
                              $("#jawabaninterview").append(`
                              <div id='detailjawaban'>
                              <label><b>Pertanyaan :</b></label><br>
                              <label>${index+1}. ${item.soal_interview}</label>
                              <br>
                              <label><b>Jawaban :</b></label><br>
                              <label>${item.jawaban_interview}</label>
                              <div>
                              `)
                          })
                      } else {
                          $("#form-jawaban-interview").show()
                          $("#btnsimpanjwb").show()
                      }
                  }
              })
              $(e.currentTarget).find('#tampilid').val(id_interview);
          });
          $('#btnsimpanjwb').on('click', function() {
              let id_soal = $('input[name="id_soal_interview[]"]').map(function() {
                  return this.value;
              }).get();
              let jwb = $('input[name="jawaban_interview[]"]').map(function() {
                  return this.value;
              }).get();
              $.ajax({
                  type: "POST",
                  url: "<?= base_url('/admin/jawabaninterview') ?>",
                  data: {
                      'id_soal[]': id_soal,
                      'jwb_int[]': jwb,
                      'id_interview': $('#tampilid').val()
                  },
                  cache: false,
                  success: function(data) {
                      $('input[name="jawaban_interview[]"]').val('')
                      $('#soalinterview').modal('toggle')
                  },
                  error: function() {
                      alert('Gagal simpan data');
                  }
              });
          })


      });
  </script>
  </body>

  </html>