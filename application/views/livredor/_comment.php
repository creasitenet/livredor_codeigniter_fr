<div id="ecrire_un_commentaire" class="form">

	<!--<?php echo validation_errors(); ?>-->
	
	<?php echo form_open('livredor/comment'); ?>
						
		<div class="form-group <?php if(form_error('pseudo')): echo 'has-error has-feedback'; endif; ?>">
			<div class="input-group">
		      	<span class="input-group-addon"><i class="fa fa-user"></i></span>
		        <input type="text" name="pseudo" value="<?php echo set_value('pseudo'); ?>" class="form-control" placeholder="Pseudo" required />                           
		    </div> 
			<?php echo form_error('pseudo'); ?>              
		</div>
				
		 <div class="form-group <?php if(form_error('text')): echo 'has-error has-feedback'; endif; ?>">
		 	<div class="input-group">
		    	<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
		        <textarea name="text" value="<?php echo set_value('text'); ?>" cols="50" rows="5" class="form-control" placeholder="Commentaire" required></textarea>
		    </div>   
		    <?php echo form_error('text'); ?>
		 </div>
		                  
		 <input type="submit" value="PUBLIEZ VOTRE COMMENTAIRE" class="btn btn-primary btn-block" />
		                  
	 <?php echo form_close(); ?>
	 <br />
			
</div>
			