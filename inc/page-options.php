<?php 

// Get widgets for sidebar

function get_sidebar_options() {
    $sidebars = [];
    $args = array(
        'post_type' => 'll_widgets',
    );
    $q_sidebars = new wp_query($args);
    if (!$q_sidebars->have_posts()) {
        return false;
    }
    while ($q_sidebars->have_posts()) {
        $q_sidebars->the_post();
        $id = get_the_id();
        $sidebar_name = get_the_title();
        $sidebars[] = ['id' => $id, 'name' => $sidebar_name];
    }
    wp_reset_postdata();
    return $sidebars;
}


$selected_title = esc_attr( get_post_meta( get_the_ID(), 'll_page_title', true ) );
$selected_title_none = (!$selected_title) ? 'selected' : '';
$selected_title_off = ($selected_title == 'title_off') ? 'selected' : '';
$selected_title_on = ($selected_title == 'title_on') ? 'selected' : '';


$selected_sidebar = esc_attr( get_post_meta( get_the_ID(), 'll_page_sidebar', true ) );
$selected_sidebar_none = (!$selected_sidebar) ? 'selected' : '';
$selected_sidebar_off = ($selected_sidebar == 'sidebar_off') ? 'selected' : '';

$selected_sidebar_position = esc_attr( get_post_meta( get_the_ID(), 'll_sidebar_position', true ) );
$selected_no_sidebar = (!$selected_sidebar_position) ? 'selected' : '';
$sidebar_position_options = ['left','right'];

$selected_prefooter = esc_attr( get_post_meta( get_the_ID(), 'll_page_prefooter', true ) );
$selected_prefooter_none = (!$selected_prefooter) ? 'selected' : '';
$selected_prefooter_off = ($selected_prefooter == 'prefooter_off') ? 'selected' : '';

?>
<h3>Page Title</h3>
<div class="ll_custom_meta_box">
    <?php 
    // print_r($selected_title);
    ?>
    <p class="meta-options ll-custom-meta-field">
        <label for="ll_page_title"><strong>Title</strong></label>
        <select name="ll_page_title" id="ll_page_title">
            <option value="0" <?php echo $selected_title_none;?>>Theme Settings Default</option>
            <option value="title_off" <?php echo $selected_title_off;?>>Hide Title</option>
            <option value="title_on" <?php echo $selected_title_on;?>>Show Title</option>
        </select>
    </p>
</div>

<h3>Sidebar</h3>
<div class="ll_custom_meta_box">
    <style scoped>
        .ll_custom_meta_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
            align-items:center;
        }
        .ll-custom-meta-field {
            display: contents;
        }
    </style>
    <p class="meta-options ll-custom-meta-field">
        <label for="ll_page_sidebar"><strong>Sidebar</strong></label>
        <?php 
            if (!get_sidebar_options()) {
                echo '<strong>No Sidebars Found</strong></br><a href="/wp-admin/post-new.php?post_type=ll_widgets">Create your first sidebar</a>';
            }
            else {
                echo "<select name='ll_page_sidebar' id='ll_page_sidebar'>";
                    echo "<option value='0' $selected_sidebar_none>- Theme Settings Default</option>";
                    echo "<option value='sidebar_off' $selected_sidebar_off>- No Sidebar</option>";
                    foreach (get_sidebar_options() as $i => $sidebar) {
                        $id = $sidebar['id'];
                        $name = $sidebar['name'];
                        $selected = ($selected_sidebar == $id) ? 'selected' : '';
                        echo "<option value='$id' $selected>$name</option>";
                    }
                echo "</select>";
            }
        ?>
    </p>
    <p class="meta-options ll-custom-meta-field">
        <label for="ll_sidebar_position"><strong>Sidebar Position</strong></label>
        <?php 
            echo "<select name='ll_sidebar_position' id='ll_sidebar_position'>";
                echo "<option value='0' $selected_no_sidebar>- Theme Settings Default</option>";
                foreach ($sidebar_position_options as $i => $value) {
                    $label = ucwords($value);
                    $selected = ($selected_sidebar_position == $value) ? 'selected' : '';
                    echo "<option value='$value' $selected>$label</option>";
                }
            echo "</select>";
        ?>
    </p>
</div>
<h3>Footer</h3>
<div class="ll_custom_meta_box">
    <style scoped>
        .ll_custom_meta_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
            align-items:center;
        }
        .ll-custom-meta-field {
            display: contents;
        }
    </style>
    <p class="meta-options ll-custom-meta-field">
        <label for="ll_page_prefooter"><strong>Pre-Footer</strong></label>
        <?php 
            if (!get_sidebar_options()) {
                echo '<strong>No Widgets Found</strong></br><a href="/wp-admin/post-new.php?post_type=ll_widgets">Create your first widget</a>';
            }
            else {
                echo "<select name='ll_page_prefooter' id='ll_page_prefooter'>";
                    echo "<option value='0' $selected_prefooter_none>- Theme Settings Default</option>";
                    echo "<option value='prefooter_off' $selected_prefooter_off>- No Pre-Footer</option>";
                    foreach (get_sidebar_options() as $i => $prefooter) {
                        $id = $prefooter['id'];
                        $name = $prefooter['name'];
                        $selected = ($selected_prefooter == $id) ? 'selected' : '';
                        echo "<option value='$id' $selected>$name</option>";
                    }
                echo "</select>";
            }
        ?>
    </p>
</div>