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
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row">URLをカンマ区切りで貼り付けてください。</th>
        <td>
          <form action="./" method="post">
            <input style='width:800px;' type="text" name="url_to_id_list" value="">
            <?php submit_button(); // 送信ボタン ?>
          </form>
        </td>
      </tr>

      <?php 
        if ($_POST('url_to_id_list')):
      ?>
      <tr>
        <td>
          <?php var_dump($_POST('url_to_id_list')); ?>
        </td>
      </tr>
      <?php endif;?>
    </tbody>
  </table>

  </div><!-- .wrap --> 

<?php } ?>