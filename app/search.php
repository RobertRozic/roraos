<?php
require 'session.php';

require 'header.php';

$search_text = '';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if(isset($_GET['search'])) {
    $search_text = $_GET['search'];
  }
}

require 'navbar.php';

$html = '';

$html .= <<<HTML
  <div class="container-fluid dashboard-main flex-center flex-column">
    <div class="row d-flex justify-content-center dashboard">
      <div class="col-10 col-md-10 d-flex flex-column align-items-center blue-panel">
HTML;

echo $html;

require 'oglasi.php';

$html = <<<HTML
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var search_text = '$search_text';
  </script>
HTML;

echo $html;

require 'footer.php';

?>
