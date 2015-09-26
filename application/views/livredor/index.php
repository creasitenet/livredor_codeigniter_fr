
	<div class="col-sm-12"> 
		
		<div class="box">
			
			<div class="infos">
				Il y a actuellement <?php echo $nb; ?> commentaires
				<a class="btn btn-primary pull-right" data-toggle="collapse" href="#collapseCommenter" aria-expanded="false" aria-controls="collapseCommenter">Ecrire un commentaire</a>
			</div>
						
			<div id="collapseCommenter" class="collapse <?php if ($this->session->flashdata('error_growl') != ''): ?> in <?php endif; ?>">
				<?php $this->load->view('livredor/_comment'); ?> 
			</div>
			
			<div class="contenu">
							
				<?php if(isset($comments)): ?> 
				  
				    <?php if(count($comments)>0): ?>
				
				        <?php foreach($comments as $i => $e): ?>
				
				            <div  id="comment_<?php echo $e->id; ?>" class="comments">
				                                           
				                   <p class="title">Par <?php echo $e->pseudo; ?> le <?php echo date('d-m-Y à H:i:s', strtotime($e->date)); ?> </p>
				                   <p class="text"><?php echo nl2br(htmlentities($e->text)); ?></p>
							
							</div>
				        
				        <?php endforeach; ?>
				        
				    <?php else: ?>
				    <p class="lead text-danger">Pas de commentaires</p>
				    <?php endif; ?>
				
			    <?php else: ?>
				    <p class="lead text-danger">Pas de commentaires</p>
				<?php endif; ?>
				
				<div class="pagination">
					<?php echo $pagination; ?>
				</div>
				
				<div class="infos">
					<p>
						Histoire de ne pas prendre de mauvaises habitudes en utilisant toujours le même Framework PHP (Laravel dans mon cas), je réalise de temps en temps quelques bouts de code sous différents Frameworks PHP. 
						Ici un système de livre d'or sous Codeigniter. Sans identification ni administration des commentaires.<br />
						Codeigniter est un framework léger et facile à prendre en main. En revanche, il manque cruellement de fonctionnalités par rapport à ces principaux concurrents. Pas de système de template, pas d'orm. J'ai ajouté quelques classes basiques qui permettent de combler ces manques. On peut aller plus loin mais il faut pratiquement tout faire à la main. 
						Vous l'aurrez compris, ce n'est pas mon framework favori. On fait mieux et plus rapidement sous d'autres frameworks. 
					</p>
				</div>
				
			</div>
		
		</div>
		
    </div>
