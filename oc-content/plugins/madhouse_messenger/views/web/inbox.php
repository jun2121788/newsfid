<?php

/*
 * ========================================================================================
 *
 * TO CUSTOMIZE
 *
 * COPY THIS FILE TO YOUR THEME IN
 * oc-content/themes/{your_theme_name}/plugins/madhouse_messenger/inbox.php
 *
 * FOR TRANSLATION, RENAME ALL "madhouse_messenger" in this file by "your_theme_name"
 * Then update your po and mo file of your theme
 *
 * ========================================================================================
 */

/*
 * ========================================================================================
 * /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
 * REMOVE THE LINE UNDER IF YOU COPY THIS VIEW ON YOUR THEME
 * /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
 * ========================================================================================
 */

Madhouse_Utils_Plugins::overrideView();

/**
 * ========================================================================================
 * /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
 * REMOVE THE LINE AVOVE IF YOU COPY THIS VIEW ON YOUR THEME
 * /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
 * ========================================================================================
 */

?>


<link rel="stylesheet" type="text/css" href="<?php echo mdh_current_plugin_url("assets/css/web.css"); ?>" />
<div class="messenger">
    <h2><?php _e("Messenger", "madhouse_messenger"); ?></h2>
    <div class="wrapper">
        <div class="clearfix messenger-pagination">
            <ul class="unstyled inline filters">
                <?php while(mdh_has_thread_labels()): ?>
                    <li class="<?php echo (Params::getParam("label") ===mdh_thread_label_name()) ? "active" : ""; ?>">
                        <a href="<?php echo mdh_messenger_inbox_url(array("label" => mdh_thread_label_name())); ?>">
                            <?php echo mdh_thread_label_title(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
                <li class="<?php echo (Params::getParam("filter") === "unread") ? "active" : ""; ?>">
                    <a href="<?php echo mdh_messenger_inbox_url(array("label" => Params::getParam("label"), "filter" => "unread")); ?>">
                        <?php _e("Unread", "madhouse_messenger"); ?>
                    </a>
                </li>
            </ul>

            <?php

                $params = array('total'              => (int) ceil(mdh_count_threads() / Params::getParam("n")),
                                'selected'           => (int) Params::getParam("p") - 1,
                                'class_prev'         => 'prev',
                                'class_next'         => 'next',
                                'class_selected'     => 'active',
                                'url'                => mdh_messenger_inbox_url(
                                    array(
                                        "label" => Params::getParam("label"),
                                        "filter" => Params::getParam("filter")
                                    ),
                                    '{PAGE}',
                                    Params::getParam("n")
                                )
                );
                $pagination = new Pagination($params);
            ?>
            <div style="float:right;">
                <div class="pagination">
                    <?php echo $pagination->doPagination(); ?>
                </div>
                <div class="showing-results">
                    <?php echo mdh_pagination_from(Params::getParam("p"), Params::getParam("n")); ?>
                    &nbsp;&ndash;&nbsp;
                    <?php echo mdh_pagination_to(Params::getParam("p"), Params::getParam("n"), mdh_count_threads()); ?>
                    &nbsp;<?php _e("on", "madhouse_messenger"); ?>&nbsp;
                    <?php echo mdh_count_threads(); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php if(mdh_count_threads()): ?>
            <ul class="unstyled threads">
                <?php while(mdh_has_threads()): ?>
                    <li class="panel-body thread content <?php echo (mdh_thread_has_unread()) ? "bg-white": ""; ?>">
                        <div class="row pos-relative ">
                            <div class="col-sm-9 col-md-3 thread-author">
                                <div class="thread-name">
                                    <?php echo mdh_thread_title_default(); ?>
                                <?php if(mdh_thread_has_unread()): ?>
                                    &nbsp;<strong>(<?php echo mdh_thread_count_unread() ?>)</strong>
                                <?php endif; ?>
                                </div>
                                <div>
                                    <span class="thread-date"><?php echo mdh_thread_formatted_last_activity(); ?></span>
                                </div>
                            </div>
                            <a href="<?php echo mdh_thread_url(); ?>" class="thread-link text-muted">
                                  <div class="col-sm-7 col-md-5 col-lg-6 thread-body">
                                    <span class="thread-subject">

                                        <?php echo mdh_thread_excerpt(); ?>

                                    </span>
                                    <div class="text-muted visible-lg-block">
                                        <?php if(
                                            mdh_thread_had_item() ||
                                                (mdh_thread_has_item() && osc_item_is_expired()) ||
                                                (mdh_thread_has_item() && function_exists("mdh_moreedit_is_archived") && mdh_moreedit_is_archived()) ||
                                                (mdh_thread_has_item() && function_exists("mdh_moreedit_is_stopped") && mdh_moreedit_is_stopped())
                                            ):
                                        ?>
                                            <em><?php _e("A deleted/disabled ad", "skeleton"); ?></em>
                                        <?php elseif(mdh_thread_has_item() && (osc_item_is_spam() || ! osc_item_is_enabled() || ! osc_item_is_active())): ?>
                                            <em><?php _e("A blocked/spam ad", "skeleton"); ?></em>
                                        <?php elseif(mdh_thread_has_item()): ?>
                                                <?php echo osc_item_title(); ?>
                                                <?php echo osc_item_city(); ?>
                                        <?php else: ?>
                                            <em><?php _e("No item linked to this thread.", "skeleton"); ?></em>
                                        <?php endif; ?>
                                    </div>
                                  </div>
                            </a>
                            <div class="col-sm-7 col-md-4 col-lg-3 thread-label">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <?php if(mdh_thread_has_status()): ?>
                                            <div class="pull-right">
                                                <span class="status status-<?php echo mdh_thread_status_name(); ?>">
                                                    <?php echo mdh_thread_status_title(); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <span class="thread-price">
                                            <?php if(mdh_thread_has_item()): ?>
                                                <?php echo osc_item_formated_price(); ?>
                                            <?php endif; ?>
                                        </span>
                                        <br>
                                        <?php if(mdh_messenger_is_inbox_page()): ?>
                                            <a href="<?php echo mdh_messenger_thread_archive_url(mdh_thread_id()); ?>">
                                                <?php _e("Archive", "madhouse_messenger"); ?>
                                            </a>
                                        <?php elseif(mdh_messenger_is_archive_page()): ?>
                                            <a href="<?php echo mdh_messenger_thread_unarchive_url(mdh_thread_id()); ?>">
                                                <?php _e("Move to inbox", "madhouse_messenger"); ?>
                                            </a>
                                        <?php endif;?>
                                        <?php while(mdh_has_thread_labels()): ?>
                                            <?php if(!mdh_thread_label_is_system()): ?>
                                                <?php if (!mdh_thread_in_label(mdh_thread_label())): ?>
                                                    <a href="<?php echo mdh_messenger_thread_label_add_url(mdh_thread_id(), mdh_thread_label_id()); ?>">
                                                        <?php _e("Mark as", "madhouse_messenger"); ?>&nbsp;<?php echo mdh_thread_label_title(); ?>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo mdh_messenger_thread_label_remove_url(mdh_thread_id(), mdh_thread_label_id()); ?>">
                                                        <?php _e("Unmark as", "madhouse_messenger"); ?>&nbsp;<?php echo mdh_thread_label_title(); ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p style="text-align: center; font-size: 1.2em; color: #666;">
                <?php _e("No messages, yet.", "madhouse_messenger"); ?>
            </p>
        <?php endif; ?>
    </div>
</div>