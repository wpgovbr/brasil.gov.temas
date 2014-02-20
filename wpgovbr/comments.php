<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<div class="row" data-layout-type="row" style="margin-top:40px;">
		<div class="cell width-15 position-0">
	<h3><?php comments_number('Nenhum comentário', '1 comentário', '% comentários' );?></h3>

	<ol><?php wp_list_comments('type=comment'); ?></ol>

	<div class="paginationCom"><?php paginate_comments_links(); ?></div>
	</div></div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- <p>Comentários fechados.</p> -->

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>
<div class="visualClear"><!-- --></div>
<article class="post" id="respond">
	<div class="row" data-layout-type="row">
		<div class="cell width-15 position-0">


	<h3><?php comment_form_title( 'Deixe um comentário', 'Deixe um comentário para %s' ); ?></h3>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>Você deve estar <a href="<?php echo wp_login_url( get_permalink() ); ?>">logado</a> para enviar um comentário.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Sair</a></p>

		<?php else : ?>

			<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" placeholder="Nome (obrigatório)" class="required" />

			<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" placeholder="E-mail (obrigatório)" class="required" />

			<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" placeholder="Site" size="27" />

		<?php endif; ?>

		<?php  comment_id_fields(); ?>
		<?php  do_action('comment_form', $post->ID); ?>

		<textarea name="comment" id="comment" cols="58" rows="10" tabindex="5" placeholder="Mensagem (obrigatório)" class="required"></textarea>

		<center><input name="send" type="button" id="send" tabindex="6" value="Enviar comentário" /></center>

	</form>

	<?php endif; // If registration required and not logged in ?>
</div></div>
</article>

<?php endif; ?>