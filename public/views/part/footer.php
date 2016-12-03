<footer>
  <div class="container">
    <p style="font-family: 'Roboto'; font-weight:normal;font-size:15px">Copyright &copy; 2016 Penanda Shop, Inc. All Rights Reserved. <span style="float:right"> <a href='' style="margin-left:20px"> About</a> <a href='' style="margin-left:20px"> Feedback</a> <a href='' style="margin-left:20px"> Report Bug</a> <a href='' style="margin-left:20px">Terms of Us</a> <a href='' style="margin-left:20px"> Privacy Policy</a> </span> </p>
  </div>
</footer>
<script src="<?php print base_url('resources/js/jquery.min.js') ?>"></script>
<script src="<?php print base_url('resources/js/bootstrap.min.js') ?>"></script>
<?php if(isset($data_js)) { echo $data_js; } ?>
<script src="<?php print base_url('resources/js/toastr.js') ?>"></script>
<script src="<?php print base_url('resources/js/custom.js') ?>"></script>
<script>
      $('.penandaku-btn-label').on('click', function() {
          var $this = $(this);
              $this.button('loading');
              setTimeout(function() {
                $this.button('reset');
              }, 1000);
      });
      $('.penandaku-btn-products').on('click', function() {
          var $this = $(this);
              $this.button('loading');
              setTimeout(function() {
                $this.button('reset');
              }, 1000);
      });
      $('.penandaku-btn-featured').on('click', function() {
          var $this = $(this);
              $this.button('loading');
              setTimeout(function() {
                $this.button('reset');
              }, 1000);
      }); 
      $('.penandaku-btn-contact').on('click', function() {
          var $this = $(this);
              $this.button('loading');
              setTimeout(function() {
                $this.button('reset');
              }, 1000);
      });                   
</script>
</div>
</body>
</html>
