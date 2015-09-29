			
			<h3>Livre d'or - Codeigniter 3</h3>
			<br />
			
			<h4>
				Il y a actuellement <?php echo $nb; ?> commentaires
				<a class="btn btn-primary btn-sm pull-right" data-toggle="collapse" href="#collapseCommenter" aria-expanded="false" aria-controls="collapseCommenter">Ecrire un commentaire</a>
			</h4>
			
			<div id="collapseCommenter" class="collapse <?php if ($this->session->flashdata('error_growl') != ''): ?> in <?php endif; ?>">
				<?php $this->load->view('livredor/_comment'); ?> 
			</div>
			
							
				<?php if(isset($comments)): ?> 
				  
				    <?php if(count($comments)>0): ?>
				
				        <?php foreach($comments as $i => $e): ?>
				
				            <div  id="comment_<?php echo $e->id; ?>" class="comments">
				                                           
				                   <p class="title">Par <?php echo $e->pseudo; ?> le <?php echo date('d-m-Y à H:i:s', strtotime($e->created)); ?> </p>
				                   <p class="text"><?php echo nl2br(htmlentities($e->text)); ?></p>
							
							</div>
				        
				        <?php endforeach; ?>
				        
				        <div class="pagination">
							<?php echo $pagination; ?>
						</div>
				
				    <?php else: ?>
				    <p class="lead text-danger">Pas de commentaires</p>
				    <?php endif; ?>
				
			    <?php else: ?>
				    <p class="lead text-danger">Pas de commentaires</p>
				<?php endif; ?>
				
			
			