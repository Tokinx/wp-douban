<div class="wrap">
    <h2>编辑条目</h2>
    <?php $subject_id = $_GET['subject_id'];
    global $wpdb;
    $subject = $wpdb->get_row("SELECT * FROM $wpdb->douban_movies WHERE id = '{$subject_id}'");
    $fave = $wpdb->get_row("SELECT * FROM $wpdb->douban_faves WHERE subject_id = '{$subject_id}'");
    ?>
    <form method="post">
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label for="url">条目</label></th>
                    <td>
                        <p><?php echo $subject->name; ?></p>
                        <p><?php echo $subject->card_subtitle; ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="url">观看时间</label></th>
                    <td>
                        <input type="datetime" name="create_time" value="<?php echo $fave->create_time ?>" class="regular-text"></input>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="url">短评</label></th>
                    <td>
                        <textarea name="remark" style="width: 600px;" rows="5" cols="30" placeholder="输入短评"><?php echo $fave->remark ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="url">评分</label></th>
                    <td>
                        <input name="score" type="number" value="<?php echo $fave->score ? $fave->score : '' ?>" min="0" max="5"></input>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wpd_action" value="edit_fave" />
        <input type="hidden" name="subject_id" value="<?php echo $subject->id ?>" />
        <input type="hidden" name="fave_id" value="<?php echo $fave->id ?>" />
        <input type="hidden" name="subject_type" value="<?php echo $fave->type ?>" />
        <div class="nm-submit-form">
            <input type="submit" class="button-primary" name="save" value="<?php _e('Save Changes') ?>" />
        </div>
    </form>
</div>