<?php

// Add menu item to the dashboard
add_action('admin_menu', 'upload_block_plugin_menu');
function upload_block_plugin_menu() {
    add_menu_page(
        'Upload Block',
        'Upload Block',
        'manage_options',
        'upload-block',
        'upload_block_plugin_page',
        'dashicons-upload',
        20
    );
}

// Display the plugin page
function upload_block_plugin_page() {
    ?>
    <div class="wrap">
        <h1>Upload Block</h1>
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('upload_block_nonce', 'upload_block_nonce_field'); ?>
            <input type="file" name="block_zip" accept=".zip" required>
            <br><br>
            <input type="submit" name="upload_block" class="button button--primary" value="Upload and Extract">
        </form>
    </div>
    <?php

    if (isset($_POST['upload_block'])) {
        handle_block_upload();
    }
}

// Handle the upload and extraction
function handle_block_upload() {
    if (!isset($_POST['upload_block_nonce_field']) || !wp_verify_nonce($_POST['upload_block_nonce_field'], 'upload_block_nonce')) {
        wp_die('Security check failed.');
    }

    if (!current_user_can('manage_options')) {
        wp_die('Insufficient permissions.');
    }

    if (!isset($_FILES['block_zip']) || $_FILES['block_zip']['error'] !== UPLOAD_ERR_OK) {
        wp_die('File upload failed.');
    }

    $uploaded_file = $_FILES['block_zip'];
    $zip_file_path = $uploaded_file['tmp_name'];
    $theme_dir = get_template_directory();

    // Define target directories for each file type
    $directories = [
        'js' => $theme_dir . '/js/blocks',
        'json' => $theme_dir . '/acf-json',
        'php' => $theme_dir . '/blocks',
        'sass' => $theme_dir . '/sass/blocks',
    ];

    // Ensure all target directories exist
    foreach ($directories as $dir) {
        if (!file_exists($dir)) {
            wp_mkdir_p($dir);
        }
    }

    // Unzip the file and process its contents
    $zip = new ZipArchive();
    if ($zip->open($zip_file_path) === TRUE) {
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $file_name = $zip->getNameIndex($i);
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            // Determine the target directory based on the file extension
            $target_dir = $directories[$file_extension] ?? null;

            if ($target_dir) {
                $zip->extractTo($target_dir, [$file_name]);
            }
        }
        $zip->close();
        echo '<div class="updated"><p>Block files have been uploaded and extracted successfully!</p></div>';
    } else {
        wp_die('Failed to unzip the archive.');
    }
}
