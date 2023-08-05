<script>
    CKEDITOR.replace('content');
  function previewImages(event) {
      var previewContainer = document.getElementById('image-preview');
      previewContainer.innerHTML = '';

      var files = event.target.files;
      for (var i = 0; i < files.length; i++) {
          var file = files[i];
          var reader = new FileReader();

          reader.onload = function (e) {
              var imgContainer = document.createElement('div');
              imgContainer.className = 'image-container';

              var imgElement = document.createElement('img');
              imgElement.src = e.target.result;
              imgElement.style.maxWidth = '200px';

              var deleteButton = document.createElement('button');
              deleteButton.innerHTML = 'X';
              deleteButton.className = 'delete-button';
              deleteButton.addEventListener('click', function () {
                  imgContainer.remove();
                  updateFileInput();
              });

              imgContainer.appendChild(imgElement);
              imgContainer.appendChild(deleteButton);
              previewContainer.appendChild(imgContainer);
          }

          reader.readAsDataURL(file);
      }

      updateFileInput();
  }

  function updateFileInput() {
      var fileInput = document.getElementById('file-input');
      var previewContainer = document.getElementById('image-preview');
      var imageContainers = previewContainer.getElementsByClassName('image-container');

      if (imageContainers.length > 0) {
          fileInput.setAttribute('multiple', 'multiple');
      } else {
          fileInput.removeAttribute('multiple');
      }
  }
        {{-- Tự động tạo Slug theo Title --}}
        document.addEventListener('DOMContentLoaded', function() {
        var titleInput = document.getElementById('title');
        var slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function() {
        var title = this.value;
        var slug = slugify(title);
        slugInput.value = slug;
    });
        function slugify(text) {
        return text.toString().toLowerCase().trim()
        .replace(/\s+/g, '-')           // Thay thế khoảng trắng bằng dấu gạch ngang
        .replace(/[^\w\-]+/g, '')       // Loại bỏ các ký tự không hợp lệ
        .replace(/\-\-+/g, '-')         // Loại bỏ các dấu gạch ngang liên tiếp
        .replace(/^-+|-+$/g, '');       // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
    }
    });
</script>

<script src="/temp/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/temp/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/temp/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/temp/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/temp/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/temp/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/temp/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/temp/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/temp/admin/plugins/moment/moment.min.js"></script>
<script src="/temp/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/temp/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/temp/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/temp/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/temp/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/temp/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/temp/admin/dist/js/pages/dashboard.js"></script>
