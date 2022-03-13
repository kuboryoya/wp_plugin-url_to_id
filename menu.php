<?php

add_action( 'admin_menu', 'add_url_to_id_menu' );


function add_url_to_id_menu() {
  add_options_page(
    'Url to ID', // page_title
    'Url to ID', // menu_title
    'administrator', // capability
    'url_to_id_by_ts', // menu_slug
    'display_url_to_id' // function
  );
}

function display_url_to_id() {

?>
  <div class="wrap">
  <h2>Url to ID</h2>
  <form method="post" action="<?php echo home_url(); ?>/wp-admin/options-general.php?page=url_to_id_by_ts">
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row">URLを区切り文字を入れて貼り付けてください。</th>
      </tr>
      <tr>
        <td>
          <input style='width:800px;' type="text" name="url_to_id_list" value="">
        </td>
      </tr>
      <tr>
        <th scope="row">区切り文字</th>
      </tr>
      <tr>
        <td>
          <input style='width:800px;' type="text" name="url_to_id_exploader" value=" ">
        </td>
      </tr>
    </tbody>
  </table>
  
  <?php submit_button('ID取得'); // 送信ボタン ?>
  </form>

  </div><!-- .wrap --> 

<?php
if ($_POST['url_to_id_list']):

  echo '<table id="nmtable">';
  echo '<tr><td>URL</td><td>ID</td></tr>';

  $url_to_id_exploader = $_POST['url_to_id_exploader'] ? $_POST['url_to_id_exploader'] : ' ';
  $url_to_id_list = explode($url_to_id_exploader, $_POST['url_to_id_list']);
    foreach ($url_to_id_list as $url_to_id_list_item) {
      echo ("<tr>");
      echo "<td style='max-width: 500px; overflow: hidden; '>" . nl2br($url_to_id_list_item) . "</td>";
      $url_to_postid = url_to_postid( $url_to_id_list_item );
      if ($url_to_postid) {
        echo "<td>$url_to_postid</td>";
      }else {
        echo '<td>NULL</td>';
      }
      echo ("</tr>");
    }
  echo '</table>';

  ?>

<?php endif;


?>

<style>
  #nmtable {
    border-collapse: collapse;
  }
  #nmtable tr,
  #nmtable td {
    border: 1px solid black;
  }
</style>


<?php } ?>