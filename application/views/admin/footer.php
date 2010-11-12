<!-- Continue From Home, Begin Footer -->

	<div id="footer">
        <div class="info">
        <?php 
        if( $this->session->userdata('logged_in') == TRUE ) {?>
        <a href="<?=base_url()?>index.php/logout_controller"> logout</a>
        <?php }?>
        </div>
        <div class="author">Created by: <?php echo $author;?></div>
	</div>
    
    </body>
</html>
