<?php 
$footer = '';

$footer .= <<<HTML
  </div>
    <script src="../src/javascript/jquery-3.2.1.min.js"></script>
    <script src="../src/javascript/popper.min.js"></script>
    <script src="../src/javascript/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>


    <script type="text/javascript">
      var userId = $id;
    </script>

    <script src="../src/javascript/app.js"></script>
  </body>
  </html>
HTML;

echo $footer;
?>